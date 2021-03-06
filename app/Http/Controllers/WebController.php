<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PiedWeb\TextSpinner\Spinner;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\User;
use App\CV;
use App\Job;
use App\Activity;
use App\Bulk;
use App\Mail\MailCv;
use App\Mail\MailJob;
use App\Mail\Applied;
use App\Mail\QuoteMail;
use App\Mail\ContactMail;
use App\Mail\BookMail;

class WebController extends Controller
{
    public function index(){
        return view('index');
    }

    public function indextwo(){
        $goutte = new Client();
        $guzzle = new GuzzleClient(array('timeout' => 60, ));
        $goutte->setClient($guzzle);
        $crawler = $goutte->request('GET', 'https://www.indeed.co.uk/jobs?q=&l=London');
        $data = $crawler->filter('div.jobsearch-SerpJobCard')->each(function ($node) {
                    return $this->getNodeContent($node); });
        foreach ($data as $detail) {
            return $detail['url'][0];
        }
        return 'https://www.indeed.co.uk'.$data[0]['url'][0];
    }

    private function hasContent($node){
        return $node->count() > 0 ? true : false;
    }

     private function getNodeContent($node){
        $array = [
            'title' => $this->hasContent($node->filter('h2.title')) != false ? $node->filter('h2.title')->text() : '',
            'location' => $this->hasContent($node->filter('span.location')) != false ? $node->filter('span.location')->text() : '',
            'content' => $this->hasContent($node->filter('div.summary')) != false ? $node->filter('div.summary')->text() : '',
            'url' => $this->hasContent($node->filter('h2.title > a')) != false ? $node->filter('h2.title > a')->extract(array('href')) : '',
            // 'featured_image' => $this->hasContent($node->filter('.post__image a img')) != false ? $node->filter('.post__image a img')->eq(0)->attr('src') : ''
        ];
        return $array;
    }

    public function quote(Request $request){

        $mail = [
            'name' => $request->name,
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ];

        Mail::to('team@temping-agency.com')->send(new QuoteMail($mail));
        return back()->with('success', 'Thank\'s for contacting us. We\'ll respond you shortly!');
    }

    public function contact(Request $request){

        $mail = [
            'name' => $request->name,
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ];

        Mail::to('team@temping-agency.com')->send(new ContactMail($mail));
        return back()->with('success', 'Thank\'s for contacting us. We\'ll respond you shortly!');
    }

    public function book_temp(Request $request){

        $mail = [
            'name' => $request->name,
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ];

        Mail::to('team@temping-agency.com')->send(new BookMail($mail));
        return back()->with('success', 'Thank\'s for contacting us. We\'ll respond you shortly!');
    }

    public function cvUpload(Request $request){
        if(User::where('email',$request->email)->first()){
            $user = User::where('email',$request->email)->first();
        }else{
            $code = str_random(10);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->CC.''.$request->phone;
            $user->password = Hash::make($code);
            $user->user_type = 'candidate';
            $user->save();
        }

        if($request->hasfile('image'))
        {
            $file = $request->file('image')->getClientOriginalName();
            $image = 'Temping-Agency'.'-'.$user->id.'-'.$file;
            $path = $request->file('cv')->storeAs('candidates/images',$image,'s3');
            $imgUrl = Storage::disk('s3')->response('candidates/images/' . $image);
        }

        if($request->hasfile('cv'))
        {
            $file = $request->file('cv')->getClientOriginalName();
            $vitae = 'Temping-Agency'.'-'.$user->id.'-'.$file;
            $path = $request->file('cv')->storeAs('candidates/cvs',$vitae,'s3');
            $cvUrl = Storage::disk('s3')->response('candidates/cvs/' . $vitae);
        }

        $cv = new CV();
        $cv->name = $user->name;
        $cv->image = $image;
        $cv->email = $user->email;
        $cv->phone = $user->phone;
        $cv->address = $request->address;
        $cv->location = $request->location;
        $cv->category = $request->category;
        $cv->pref_temporary = $request->choice;
        $cv->availability = $request->availability;
        $cv->expected_salary = $request->salary;
        $cv->cv = $vitae;
        $cv->user_id = $user->id;
        $cv->platform = 'Temping Agency';
        $cv->save();

        $mail = [
            'name' => $cv->name,
            'email' =>$cv->email,
            'phone' =>$cv->phone,
            'code' => isset($code)?$code:'',
            'location' => $cv->location,
            'cv' => $cvUrl,
        ];

        Mail::to($user->email)->send(new MailCv($mail));
        return redirect()->back()->with('success','Congratulations! Your CV has been uploaded');
    }
    public function post(Request $request){
        if(User::where('email',$request->email)->first()){
            $user = User::where('email',$request->email)->first();
        }else{
            $code = str_random(10);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->CC.''.$request->phone;
            $user->password = Hash::make($code);
            $user->user_type = 'candidate';
            $user->save();
        }

        $job = new Job();
        $job->title = $request->title;
        $job->meta_description = '';
        $job->links = '';
        $job->description = isset($request->desc)?$request->desc:'';
        $job->tags = isset($request->tags)?$request->tags:'';
        $job->category = isset($request->category)?$request->category:'';
        $job->location = isset($request->location)?$request->location:'';
        $job->duration = isset($request->duration)?$request->duration:'';
        $job->joining_date = isset($request->joiningDate)?$request->joiningDate:'';
        $job->end_date = isset($request->endingDate)?$request->endingDate:'';
        $job->vacancies = isset($request->vacancy)?$request->vacancy:'';
        $job->salary = isset($request->salaryFrom)?$request->salaryFrom:'';
        $job->timings = isset($request->jobTiming)?$request->jobTiming:'';
        $job->opening_dates = isset($request->openingDate)?$request->openingDate:'';
        $job->purpose = isset($request->jobPurpose)?$request->jobPurpose:'';
        $job->responsibilities = isset($request->responsibilities)?$request->responsibilities:'';
        $job->requirements = isset($request->requirements)?$request->requirements:'';
        $job->approved = 3;
        $job->slug = $this->createSlug($job->title);
        $job->user_id = $user->id;
        if($request->hasfile('file_source')){
            $file = $request->file('file_source');
            $ext = $file->getClientOriginalExtension();
            $trim = str_replace('', '-', $request->title);
            $name = $user->id.'-'.$trim.'.'.$ext;
            if($file->move('public/assets/images/jobs/'.$name))
                $job->image = $name;
        }else
            $job->image = '';

        $job->save();

        $mail = [
            'name' => $user->name,
            'email' =>$user->email,
            'phone' =>$user->phone,
            'code' => isset($code)?$code:'',
            'title' => $job->title,
            'location' => $job->location,
            'type' => $job->type,
            'company' => $job->company,
        ];

        Mail::to($user->email)->send(new MailJob($mail));
        return redirect()->back()->with('success','Congratulations! Your Job has been uploaded');
    }

    public function jobs(){
        $jobs = Bulk::orderByDesc('id')->paginate(9);
        return view('career',compact('jobs'));
    }

    public function job_detail($slug){
        $job = Bulk::where('slug',$slug)->first();
        $brand = Spinner::spin('{No 1 Temp Recruitment Agency UK|Leading Recruitment Agency In UK|Top Rated Recruitment Agency In UK|Leading Recruitment Agency For Temp Jobs|UK\'s Leading Recruitment Agency For Temp Jobs}');
        $meta_title = $job->title.' - '.$brand;
        // preg_match("/(?:\w+(?:\W+|$)){0,10}/", $job->content, $matches);
        // return $matches[0];
        return view('job',compact('job','meta_title'));
    }

    public function apply_job(Request $request){
        if(User::where('email',$request->email)->first()){
            $user = User::where('email',$request->email)->first();
        }else{
            $code = str_random(10);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->CC.''.$request->phone;
            $user->password = Hash::make($code);
            $user->user_type = 'candidate';
            $user->save();
        }

        $job = Bulk::find($request->job);

        $ja = new Activity();
        $ja->job_id = $job->id;
        $ja->user_id = $user->id;
        $ja->save();

        if($request->hasfile('cv'))
        {
            $file = $request->file('cv')->getClientOriginalName();
            $vitae = 'Temping-Agency'.'-'.$user->id.'-'.$file;
            $path = $request->file('cv')->storeAs('candidates/cvs',$vitae,'s3');
            $cvUrl = Storage::disk('s3')->response('candidates/cvs/' . $vitae);
            // <img src="{{ Storage::disk('spaces')->url($photo->image) }}" />
        }

        $cv = new CV();
        $cv->name = $user->name;
        $cv->email = $user->email;
        $cv->phone = $user->phone;
        $cv->cv = $vitae;
        $cv->user_id = $user->id;
        $cv->platform = 'Temping Agency';
        $cv->save();

        $mail = [
            'name' => $user->name,
            'email' =>$user->email,
            'phone' =>$user->phone,
            'code' => isset($code)?$code:'',
            'title' => $job->title,
            'location' => $job->location,
            'type' => $job->type,
            'company' => $job->company,
        ];

        Mail::to($user->email)->send(new Applied($mail));
        return redirect()->back()->with('success','Successfully Applied for this job!');

    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title;;;;;
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Bulk::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

}
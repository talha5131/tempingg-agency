@extends('layouts.base')
@include('meta::manager', [
    'title'         => $meta_title,
    'description' => $job->meta_description,
])
@section('title',$job->title)
@section('content')
<link rel="icon" href="{{ url('public/assets/images/logo-favicon.png')}}" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('public/assets/images/logo-favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('public/assets/images/logo-favicon.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{ url('public/assets/images/logo-favicon.png')}}">
<style>
	@media only screen and (min-width: 200px) and (max-width: 768px) {
		body {
			/* width: 100%; */
			overflow-x: hidden;
		}
	}

	#file-upload-button {
		color: red;
	}
</style>




<div id="banner-area">

	<img src="{{url('public/assets/images/banner/banner1.jpg')}}" alt="" />

	<div class="parallax-overlay"></div>

	<!-- Subpage title start -->

	<div class="banner-title-content">

		<div class="text-center">
			<br>
			<h2>Job</h2>
		</div>

	</div><!-- Subpage title end -->

</div><!-- Banner area end -->



<!-- Main container start -->



<section id="main-container">

	<div class="container">



		<!-- Company Profile -->

		@if (session('success'))
		<div class="row">
			<div class="col-md-12 heading text-center">
				<div class="alert  alert-success alert-dismissible" role="alert">
					{{ session('success') }}
				</div>
			</div>
		</div>
		@endif


		<div class="row">

			<div class="col-md-12 heading text-center">

				<h2 class="title2">{{ $job->title }}

					<span class="title-desc"> Temping Agency </span>

				</h2>

			</div>

		</div><!-- Title row end -->



		<div class="row about-wrapper-top">

			<div class="col-md-12 ts-padding about-message">
				<div class="row">
					<div class="col-md-12">
						<h3 style="text-align: center;">Job Description</h3>
					</div>
				</div>
				<br>
				<p>
					<?php
						echo $job->content;
					?>
				</p>
				<br>
                @if($job->links != '')
                    <div class="col-sm-4 form-group">
                        <h3><a target="_blank" href="{{ $job->links }}">
                        	<label for="jobtype">External Link</label>
                        </a><h3>
                    </div>
                @endif

				<form id="jobApplyForm" action="{{route('apply-job')}}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="job" value="{{$job->id}}">
					<div class="form-group">
						<label for="fname">Full Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Peter John">
						<h5 id="namecheck"></h5>
					</div>
					<hr>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="johnpeter@gmail.com">
						<h5 id="emailcheck"></h5>
					</div>
					<hr>
					<div class="col-sm-12 form-group">
						<label for="phone">Phone Number</label>
						<div class="row">
							<div class="col-sm-2">
								<select name="CC" id="CC" class="form-control">
									<option data-countryCode="GB" value="+44" Selected>+44</option>
									<option data-countryCode="US" value="+1">+1</option>
									<optgroup label="Other countries">
										<option data-countryCode="DZ" value="+213">+213</option>
										<option data-countryCode="AD" value="+376">+376</option>
										<option data-countryCode="AO" value="+244">+244</option>
										<option data-countryCode="AI" value="+1264">+1264</option>
										<option data-countryCode="AG" value="+1268">+1268</option>
										<option data-countryCode="AR" value="+54">+54</option>
										<option data-countryCode="AM" value="+374">+374</option>
										<option data-countryCode="AW" value="+297">+297</option>
										<option data-countryCode="AU" value="+61">+61</option>
										<option data-countryCode="AT" value="+43">+43</option>
										<option data-countryCode="AZ" value="+994">+994</option>
										<option data-countryCode="BS" value="+1242">+1242</option>
										<option data-countryCode="BH" value="+973">+973</option>
										<option data-countryCode="BD" value="+880">+880</option>
										<option data-countryCode="BB" value="+1246">+1246</option>
										<option data-countryCode="BY" value="+375">+375</option>
										<option data-countryCode="BE" value="+32">+32</option>
										<option data-countryCode="BZ" value="+501">+501</option>
										<option data-countryCode="BJ" value="+229">+229</option>
										<option data-countryCode="BM" value="+1441">+1441</option>
										<option data-countryCode="BT" value="+975">+975</option>
										<option data-countryCode="BO" value="+591">+591</option>
										<option data-countryCode="BA" value="+387">+387</option>
										<option data-countryCode="BW" value="+267">+267</option>
										<option data-countryCode="BR" value="+55">+55</option>
										<option data-countryCode="BN" value="+673">+673</option>
										<option data-countryCode="BG" value="+359">+359</option>
										<option data-countryCode="BF" value="+226">+226</option>
										<option data-countryCode="BI" value="+257">+257</option>
										<option data-countryCode="KH" value="+855">+855</option>
										<option data-countryCode="CM" value="+237">+237</option>
										<option data-countryCode="CA" value="+1">+1</option>
										<option data-countryCode="CV" value="+238">+238</option>
										<option data-countryCode="KY" value="+1345">+1345</option>
										<option data-countryCode="CF" value="+236">+236</option>
										<option data-countryCode="CL" value="+56">+56</option>
										<option data-countryCode="CN" value="+86">+86</option>
										<option data-countryCode="CO" value="+57">+57</option>
										<option data-countryCode="KM" value="+269">+269</option>
										<option data-countryCode="CG" value="+242">+242</option>
										<option data-countryCode="CK" value="+682">+682</option>
										<option data-countryCode="CR" value="+506">+506</option>
										<option data-countryCode="HR" value="+385">+385</option>
										<option data-countryCode="CU" value="+53">+53</option>
										<option data-countryCode="CY" value="+90392">+90392</option>
										<option data-countryCode="CY" value="+357">+357</option>
										<option data-countryCode="CZ" value="+42">+42</option>
										<option data-countryCode="DK" value="+45">+45</option>
										<option data-countryCode="DJ" value="+253">+253</option>
										<option data-countryCode="DM" value="+1809">+1809</option>
										<option data-countryCode="DO" value="+1809">+1809</option>
										<option data-countryCode="EC" value="+593">+593</option>
										<option data-countryCode="EG" value="+20">+20</option>
										<option data-countryCode="SV" value="+503">+503</option>
										<option data-countryCode="GQ" value="+240">+240</option>
										<option data-countryCode="ER" value="+291">+291</option>
										<option data-countryCode="EE" value="+372">+372</option>
										<option data-countryCode="ET" value="+251">+251</option>
										<option data-countryCode="FK" value="+500">+500</option>
										<option data-countryCode="FO" value="+298">+298</option>
										<option data-countryCode="FJ" value="+679">+679</option>
										<option data-countryCode="FI" value="+358">+358</option>
										<option data-countryCode="FR" value="+33">+33</option>
										<option data-countryCode="GF" value="+594">+594</option>
										<option data-countryCode="PF" value="+689">+689</option>
										<option data-countryCode="GA" value="+241">+241</option>
										<option data-countryCode="GM" value="+220">+220</option>
										<option data-countryCode="GE" value="+7880">+7880</option>
										<option data-countryCode="DE" value="+49">+49</option>
										<option data-countryCode="GH" value="+233">+233</option>
										<option data-countryCode="GI" value="+350">+350</option>
										<option data-countryCode="GR" value="+30">+30</option>
										<option data-countryCode="GL" value="+299">+299</option>
										<option data-countryCode="GD" value="+1473">+1473</option>
										<option data-countryCode="GP" value="+590">+590</option>
										<option data-countryCode="GU" value="+671">+671</option>
										<option data-countryCode="GT" value="+502">+502</option>
										<option data-countryCode="GN" value="+224">+224</option>
										<option data-countryCode="GW" value="+245">+245</option>
										<option data-countryCode="GY" value="+592">+592</option>
										<option data-countryCode="HT" value="+509">+509</option>
										<option data-countryCode="HN" value="+504">+504</option>
										<option data-countryCode="HK" value="+852">+852</option>
										<option data-countryCode="HU" value="+36">+36</option>
										<option data-countryCode="IS" value="+354">+354</option>
										<option data-countryCode="IN" value="+91">+91</option>
										<option data-countryCode="ID" value="+62">+62</option>
										<option data-countryCode="IR" value="+98">+98</option>
										<option data-countryCode="IQ" value="+964">+964</option>
										<option data-countryCode="IE" value="+353">+353</option>
										<option data-countryCode="IL" value="+972">+972</option>
										<option data-countryCode="IT" value="+39">+39</option>
										<option data-countryCode="JM" value="+1876">+1876</option>
										<option data-countryCode="JP" value="+81">+81</option>
										<option data-countryCode="JO" value="+962">+962</option>
										<option data-countryCode="KZ" value="+7">+7</option>
										<option data-countryCode="KE" value="+254">+254</option>
										<option data-countryCode="KI" value="+686">+686</option>
										<option data-countryCode="KP" value="+850">+850</option>
										<option data-countryCode="KR" value="+82">+82</option>
										<option data-countryCode="KW" value="+965">+965</option>
										<option data-countryCode="KG" value="+996">+996</option>
										<option data-countryCode="LA" value="+856">+856</option>
										<option data-countryCode="LV" value="+371">+371</option>
										<option data-countryCode="LB" value="+961">+961</option>
										<option data-countryCode="LS" value="+266">+266</option>
										<option data-countryCode="LR" value="+231">+231</option>
										<option data-countryCode="LY" value="+218">+218</option>
										<option data-countryCode="LI" value="+417">+417</option>
										<option data-countryCode="LT" value="+370">+370</option>
										<option data-countryCode="LU" value="+352">+352</option>
										<option data-countryCode="MO" value="+853">+853</option>
										<option data-countryCode="MK" value="+389">+389</option>
										<option data-countryCode="MG" value="+261">+261</option>
										<option data-countryCode="MW" value="+265">+265</option>
										<option data-countryCode="MY" value="+60">+60</option>
										<option data-countryCode="MV" value="+960">+960</option>
										<option data-countryCode="ML" value="+223">+223</option>
										<option data-countryCode="MT" value="+356">+356</option>
										<option data-countryCode="MH" value="+692">+692</option>
										<option data-countryCode="MQ" value="+596">+596</option>
										<option data-countryCode="MR" value="+222">+222</option>
										<option data-countryCode="YT" value="+269">+269</option>
										<option data-countryCode="MX" value="+52">+52</option>
										<option data-countryCode="FM" value="+691">+691</option>
										<option data-countryCode="MD" value="+373">+373</option>
										<option data-countryCode="MC" value="+377">+377</option>
										<option data-countryCode="MN" value="+976">+976</option>
										<option data-countryCode="MS" value="+1664">+1664</option>
										<option data-countryCode="MA" value="+212">+212</option>
										<option data-countryCode="MZ" value="+258">+258</option>
										<option data-countryCode="MN" value="+95">+95</option>
										<option data-countryCode="NA" value="+264">+264</option>
										<option data-countryCode="NR" value="+674">+674</option>
										<option data-countryCode="NP" value="+977">+977</option>
										<option data-countryCode="NL" value="+31">+31</option>
										<option data-countryCode="NC" value="+687">+687</option>
										<option data-countryCode="NZ" value="+64">+64</option>
										<option data-countryCode="NI" value="+505">+505</option>
										<option data-countryCode="NE" value="+227">+227</option>
										<option data-countryCode="NG" value="+234">+234</option>
										<option data-countryCode="NU" value="+683">+683</option>
										<option data-countryCode="NF" value="+672">+672</option>
										<option data-countryCode="NP" value="+670">+670</option>
										<option data-countryCode="NO" value="+47">+47</option>
										<option data-countryCode="OM" value="+968">+968</option>
										<option data-countryCode="PW" value="+680">+680</option>
										<option data-countryCode="PA" value="+507">+507</option>
										<option data-countryCode="PG" value="+675">+675</option>
										<option data-countryCode="PY" value="+595">+595</option>
										<option data-countryCode="PE" value="+51">+51</option>
										<option data-countryCode="PH" value="+63">+63</option>
										<option data-countryCode="PL" value="+48">+48</option>
										<option data-countryCode="PT" value="+351">+351</option>
										<option data-countryCode="PR" value="+1787">+1787</option>
										<option data-countryCode="QA" value="+974">+974</option>
										<option data-countryCode="RE" value="+262">+262</option>
										<option data-countryCode="RO" value="+40">+40</option>
										<option data-countryCode="RU" value="+7">+7</option>
										<option data-countryCode="RW" value="+250">+250</option>
										<option data-countryCode="SM" value="+378">+378</option>
										<option data-countryCode="ST" value="+239">+239</option>
										<option data-countryCode="SA" value="+966">+966</option>
										<option data-countryCode="SN" value="+221">+221</option>
										<option data-countryCode="CS" value="+381">+381</option>
										<option data-countryCode="SC" value="+248">+248</option>
										<option data-countryCode="SL" value="+232">+232</option>
										<option data-countryCode="SG" value="+65">+65</option>
										<option data-countryCode="SK" value="+421">+421</option>
										<option data-countryCode="SI" value="+386">+386</option>
										<option data-countryCode="SB" value="+677">+677</option>
										<option data-countryCode="SO" value="+252">+252</option>
										<option data-countryCode="ZA" value="+27">+27</option>
										<option data-countryCode="ES" value="+34">+34</option>
										<option data-countryCode="LK" value="+94">+94</option>
										<option data-countryCode="SH" value="+290">+290</option>
										<option data-countryCode="KN" value="+1869">+1869</option>
										<option data-countryCode="SC" value="+1758">+1758</option>
										<option data-countryCode="SD" value="+249">+249</option>
										<option data-countryCode="SR" value="+597">+597</option>
										<option data-countryCode="SZ" value="+268">+268</option>
										<option data-countryCode="SE" value="+46">+46</option>
										<option data-countryCode="CH" value="+41">+41</option>
										<option data-countryCode="SI" value="+963">+963</option>
										<option data-countryCode="TW" value="+886">+886</option>
										<option data-countryCode="TJ" value="+7">+7</option>
										<option data-countryCode="TH" value="+66">+66</option>
										<option data-countryCode="TG" value="+228">+228</option>
										<option data-countryCode="TO" value="+676">+676</option>
										<option data-countryCode="TT" value="+1868">+1868</option>
										<option data-countryCode="TN" value="+216">+216</option>
										<option data-countryCode="TR" value="+90">+90</option>
										<option data-countryCode="TM" value="+7">+7</option>
										<option data-countryCode="TM" value="+993">+993</option>
										<option data-countryCode="TC" value="+1649">+1649</option>
										<option data-countryCode="TV" value="+688">+688</option>
										<option data-countryCode="UG" value="+256">+256</option>
										<!-- <option data-countryCode="GB" value="+44">UK +44</option> -->
										<option data-countryCode="UA" value="+380">+380</option>
										<option data-countryCode="AE" value="+971">+971</option>
										<option data-countryCode="UY" value="+598">+598</option>
										<!-- <option data-countryCode="US" value="+1">USA +1</option> -->
										<option data-countryCode="UZ" value="+7">+7</option>
										<option data-countryCode="VU" value="+678">+678</option>
										<option data-countryCode="VA" value="+379">+379</option>
										<option data-countryCode="VE" value="+58">+58</option>
										<option data-countryCode="VN" value="+84">+84</option>
										<option data-countryCode="VG" value="+84">+1284</option>
										<option data-countryCode="VI" value="+84">+1340</option>
										<option data-countryCode="WF" value="+681">+681</option>
										<option data-countryCode="YE" value="+969">+969</option>
										<option data-countryCode="YE" value="+967">+967</option>
										<option data-countryCode="ZM" value="+260">+260</option>
										<option data-countryCode="ZW" value="+263">+263</option>
									</optgroup>
								</select>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" maxlength="10" id="phone" name="phone" placeholder="Enter Your Phone Number">
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label id="cvLabel" class="btn btn-primary">
									<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Upload Your CV
									<input style="color: #ffb100; display: none;" class="form-control cv g-brd-none rounded g-px-20 g-py-12" type="file" id="cv" name="cv" accept=".rtf,.doc,.docx,.pdf">
								</label>
								<small class="form-text text-muted">Maximum file size: 2 MB.</small>
								<h4 id="cvUploadStatus"></h4>
							</div>
							<div class="fileUpload">

							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<!--/ About message end -->

			<!--/ About image end -->

		</div>
		<!--/ Content row end -->

		<!-- Company Profile -->



	</div>
	<!--/ 1st container end -->





	<div class="gap-60"></div>





	<!-- Counter Strat -->

	<div class="ts_counter_bg parallax parallax2">
		<div class="parallax-overlay"></div>
		<div class="container">
			<div class="row wow fadeInLeft text-center">
				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="fas fa-users"></i></span>
					<div class="facts-num">
						<span class="counter">52950</span> <span> +</span>
					</div>
					<h3>Workers</h3>
				</div>

				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="far fa-thumbs-up"></i></span>
					<div class="facts-num">
						<span class="counter">98</span> <span> %</span>
					</div>
					<h3>Enjoy work with us</h3>
				</div>

				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="fas fa-user-shield"></i></span>
					<div class="facts-num">
						<span class="counter">92</span> <span> %</span>
					</div>
					<h3>Retained Workers</h3>
				</div>

				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="far fa-clock"></i></span>
					<div class="facts-num">
						<span class="counter">4773600</span> <span> +</span>
					</div>
					<h3>Worked Hours</h3>
				</div>

				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="fa fa-user"></i></span>
					<div class="facts-num">
						<span class="counter">1200</span> <span> +</span>
					</div>
					<h3>Clients</h3>
				</div>

				<div class="facts col-md-2 col-sm-6">
					<span class="facts-icon"><i class="fas fa-building"></i></span>
					<div class="facts-num">
						<span class="counter">39780</span> <span> +</span>
					</div>
					<h3>Sites</h3>
				</div>





			</div>
			<!--/ row end -->
		</div>
		<!--/ Container end -->
	</div>
	<!--/ Counter end -->







</section>
<!--/ Main container end -->


<!-- Javascript Files

================================================== -->

<!-- initialize jQuery Library -->

<script type="text/javascript" src="{{url('public/assets/js/jquery.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

</div><!-- Body inner end -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#jobApplyForm').validate({
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					minlength: 5,
					maxlength: 10
				},
				cvUpload: {
					required: true,
				},
			}
		});
	});
	$('#cv').change(function() {
		if ($('#cv').val() != '') {
			setTimeout(function() {
				$('#cvUploadStatus').text('Your CV Is Uploaded.');
			}, 1000);
		}
	});
</script>
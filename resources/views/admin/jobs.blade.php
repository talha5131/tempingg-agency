@extends('admin.layout.base')
@section('title','Admin Jobs')
@section('content')
<link rel="icon" href="public/assets/images/logo-favicon.png" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/assets/images/logo-favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/assets/images/logo-favicon.png">
<link rel="apple-touch-icon-precomposed" href="public/assets/images/logo-favicon.png">
<style>
    a{
        color: #51284f;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">All Jobs</h1>
                            <hr>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jobs</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Jobs</li>
            </ul>
            <!-- Main content -->
            <section class="content">
                <table id="job-table" class="table table-bordered table-striped">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($jobs as $key => $job)
                    <tr>
                        <td>{{ $jobs->firstItem() + $key }}</td>
                        <td>{{$job->title}}</td>
                        <td>{{$job->category}}</td>
                        <td>
                            @if($job->approved == 1)
                                <a href="{{ url('status') }}/{{$job->id}}"><i class="far fa-eye"></i></a>
                            @elseif($job->approved == 0)
                                <a href="{{ url('status') }}/{{$job->id}}"><i class="far fa-eye-slash"></i></a>
                            @endif
<!--                             <a href="javascript:void(0)"><i class="far fa-trash-alt"></i></a> -->
                            <a target="_blank" href="{{ route('admin.jobDetails',['id' => $job->id])}}"><i class="fas fa-info-circle"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $jobs->links() }}
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function upd(id){
        $.ajax({
            url: '{{ url('status') }}/'+id,
            type: "GET",
            success: function(result){
                    // $('#job-table').reload()
                     console.log(result);
            }
        });
    }
</script>

@endsection

@extends('layouts.base')
@include('meta::manager', [
    'title'         => 'Locations',
    'description' => '•	RECRUITMENT AGENCY ILFORD, GREATER LONDON
Ilford, Greater London 344-348 High Road, IG1 1QP

Tel: +442030869080
•	RECRUITMENT AGENCY CENTRAL LONDON
207 Regent Street, Marylebone, London W1A 6US Tel:+443332422711
•	RECRUITMENT AGENCY MANCHESTER
Unit 20648, Oldham Road, Manchester. M61 0BW Tel:+443332422711
',
])
@section('title','Locations')
@section('content')
<link rel="icon" href="public/assets/images/logo-favicon.png" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/assets/images/logo-favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/assets/images/logo-favicon.png">
<link rel="apple-touch-icon-precomposed" href="public/assets/images/logo-favicon.png">
<style>
	@media only screen and (min-width: 200px) and (max-width: 768px) {
		body {
			/* width: 100%; */
			overflow-x: hidden;
		}
	}
</style>


<div id="banner-area">

	<img src="public/assets/images/banner/banner1.jpg" alt="" />

	<div class="parallax-overlay"></div>

	<!-- Subpage title start -->

	<div class="banner-title-content">

		<div class="text-center">

			<h2>Locations</h2>

			<ul class="breadcrumb">

				<li><a href="{{url('/')}}"> Home</a></li>

				<li>Locations</li>



			</ul>

		</div>

	</div><!-- Subpage title end -->

</div><!-- Banner area end -->



<!-- Main container start -->



<section id="main-container">

	<div class="container">



		<!-- Company Profile -->



		<div class="row">

			<div class="col-md-12 heading text-center">

				<h2 class="title2">Locations

					<span class="title-desc">Temping Agency</span>

				</h2>

			</div>

		</div><!-- Title row end -->



		<div class="row about-wrapper-bottom">



		</div>
		<!--/ Content row end -->



		<div class="row about-wrapper-top">

			<div class="col-md-12 ts-padding about-message">
				<div class="row">
					<div class="col-md-4">
						<div class="well">
							<img src="public/assets/images/construction/Construction-Laborers.jpg" class="img-responsive">
							<h4 style="color: #51284f">Recruitment Agency Ilford, Greater London</h4>
							<p>Ilford, Greater London 344-348 High Road, IG1 1QP</p>
							<strong> Tel: +442030869080</strong>
							<button class="btn btn-primary">Read More</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="well">
							<img src="public/assets/images/pictures/hub-05-29-jobinterviewlies-Hero-1200x900.jpg" class="img-responsive">
							<h4 style="color: #51284f">Recruitment Agency Central London </h4>
							<p>207 Regent Street, Marylebone, London W1A 6US</p>
							<strong>Tel: +443332422711</strong>
							<button class="btn btn-primary">Read More</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="well">
							<img src="public/assets/images/construction/Construction-Laborers.jpg" class="img-responsive">
							<h4 style="color: #51284f">Recruitment Agency Manchester</h4>
							<p>Unit 20648, Oldham Road, Manchester. M61 0BW</p>
							<strong>Tel: +443332422711</strong>
							<button class="btn btn-primary">Read More</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="well">
							<img src="public/assets/images/pictures/hub-05-29-jobinterviewlies-Hero-1200x900.jpg" class="img-responsive">
							<h4 style="color: #51284f">Recruitment Agency Central London </h4>
							<p>207 Regent Street, Marylebone, London W1A 6US</p>
							<strong>Tel: +443332422711</strong>
							<button class="btn btn-primary">Read More</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="well">
							<img src="public/assets/images/construction/Construction-Laborers.jpg" class="img-responsive">
							<h4 style="color: #51284f">Recruitment Agency Manchester</h4>
							<p>Unit 20648, Oldham Road, Manchester. M61 0BW</p>
							<strong>Tel: +443332422711</strong>
							<button class="btn btn-primary">Read More</button>
						</div>
					</div>
				</div>
			</div>
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

</div><!-- Body inner end -->
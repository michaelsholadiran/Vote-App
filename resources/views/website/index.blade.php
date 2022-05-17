@extends('website.layout.master')

@section('content')
		<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</a>
					<h1 class="brand"><a href="index.html">CRU E-Vote</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="team" href="#about">Get Started</a></li>
													<li><a title="works" href="#works">CONTESTANTS</a></li>
													{{-- <li><a href="{{route("login")}}" target="_blank">Admin</a></li> --}}
							<li><a href="{{route("voter.login")}}" target="_blank" class="btn btn-primary">Login</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	<div id="header-wrapper" class="header-slider">
		<header class="clearfix">
			<div class="logo">
				<img src="assets/img/logo-image.png" alt="" />
			</div>
			<div class="container">
				<div class="row">
					<div class="span12 mt-3">
						<div id="main-flexslider" class="flexslider mt-5" style="margin-top:20px;">
							<ul class="slides">
								<li>
									<p class="home-slide-content text-secondary">
										<strong>Welcome To CRU</strong> E-vote
									</p>
								</li>
					<h3>Vote made simple a click away voting the right leader</h3>
					<h4>With the new cru vote sytem your vote is secure and also counted</h4>
					<style media="screen">
						.to-be{
							position: absolute;
							bottom: -300px;
							z-index: -1;
						}
					</style>
<img src="{{asset('website_assets/img/wing.png')}}" class="to-be" alt="">
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>

		</header>
	</div>
	<!-- spacer section -->
		<!-- end spacer section -->
	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<h4>Steps to Vote</h4>

			<div class="row">
				<div class="span2 offset1 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="{{asset('website_assets')}}/img/team/img-1.jpg" alt="" />
						<h3>Preview</h3>
						<p>
						You Can Preview Candidates to vote for carefully That On The Main
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="{{asset('website_assets')}}/img/team/img-2.jpg" alt="" />
						<h3>Login</h3>
						<p>
							Login to vote
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="{{asset('website_assets')}}/img/team/img-3.jpg" alt="" />
						<h3>Choose</h3>
						<p>
					You Should Vote For All
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="{{asset('website_assets')}}/img/team/img-4.jpg" alt="" />
						<h3>Submit You  Vote</h3>
						<p>
							At the end of your multiple choices you can preview before submitting your vote Waiting to be counted
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="{{asset('website_assets')}}/img/team/img-5.jpg" alt="" />
						<h3>Finite</h3>
						<p>
							finite
						</p>
					</div>
				</div>
				<ul class="bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->

	<!-- section: works -->
  @include('website.layout.candidates')
  <!-- section: services -->
  <!-- end section: services -->
	<!-- spacer section -->
	<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						This Online E-Vote System Is trusted  with a reputation for high integrity
					</blockquote>
				</div>
				<div class="span12 aligncenter flyRight">
					<i class="icon-rocket icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: blog -->


	<!-- end spacer section -->
	<!-- section: contact -->
	@endsection
	@section('script')
	@include('website.layout.notify')
	@endsection

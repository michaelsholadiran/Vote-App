@extends('admin.layout.master')
@section('content')
  <!--Main container start -->
  	<main class="ttr-wrapper">
  		<div class="container-fluid">
  			<div class="db-breadcrumb">
  				<h4 class="breadcrumb-title">post</h4>
  				<ul class="db-breadcrumb-list">
  					<li><a href="#"><i class="fa fa-home"></i>post</a></li>
  					<li>Add  post</li>
  				</ul>
  			</div>
  			<div class="row">
  				<!-- Your Profile Views Chart -->
  				<div class="col-lg-12 m-b30">
  					<div class="widget-box">
  						<div class="wc-title">
  							<h4>post</h4>
  						</div>
  						<div class="widget-inner">
                <div class="col-md-2 ">
            <a href="{{route('admin.post.download-csv')}}" class="btn bg-danger">Generate Csv<i class="fa fa-fw fa-plus-circle"></i></a href="">
                </div>
  							<form action="{{route('admin.post.upload-bulk')}}"  enctype="multipart/form-data" method="post" class="edit-profile m-b30">
                  @csrf
                    <div class="row justify-content-center">
                      <div class="col-md-2">

                        <label for="csv">
  <span  class="btn bg-primary">Upload Csv<i class="fa fa-fw fa-plus-circle"></i></span>
                  </label>
                  <input type="file" name="file"  id="csv" class="d-none">
                      </div>
                      <div class="col-md-2">
                  <button type="submit" class="btn bg-secondary">Submit <i class="fa fa-fw fa-plus-circle"></i></button>
                      </div>
                    </div>
  							</form>
  				 </div>
  				</div>
  				<!-- Your Profile Views Chart END-->
  			</div>
  		</div>
  	</main>
  @endsection
  @section('script')
  @include('admin.layout.notify')
  @endsection

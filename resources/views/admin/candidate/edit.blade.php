@extends('admin.layout.master')
@section('content')
  <!--Main container start -->
  	<main class="ttr-wrapper">
  		<div class="container-fluid">
  			<div class="db-breadcrumb">
  				<h4 class="breadcrumb-title">Candidate</h4>
  				<ul class="db-breadcrumb-list">
  					<li><a href="#"><i class="fa fa-home"></i>Candidate</a></li>
  					<li>Edit  Candidate</li>
  				</ul>
  			</div>
  			<div class="row">
  				<!-- Your Profile Views Chart -->
  				<div class="col-lg-12 m-b30">
  					<div class="widget-box">
  						<div class="wc-title">
  							<h4>Candidate</h4>

  						</div>
  						<div class="widget-inner">
  							<form action="{{route('admin.candidate.update')}}" method="post"  class="edit-profile m-b30">
      @csrf
      {{ method_field('PUT') }}
  									<div class="form-group row">
  										<label class="col-sm-2 col-form-label">Full Name</label>
  										<div class="col-sm-7">
  											<input class="form-control" type="text" name="name" value="{{ $candidate->name }} ">
  										</div>

  									</div>
  									<div class="form-group row">
  										<label class="col-sm-2 col-form-label">Level</label>
  										<div class="col-sm-7">
  											<input class="form-control" type="text" name="level"  value="{{ $candidate->level }}">
  										</div>
  									</div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Matric</label>
                      <div class="col-sm-7">
                        <input class="form-control" type="text" name="candidate_id"  value="{{ $candidate->candidate_id }}">
                      </div>
                    </div>

                        <input class="form-control" type="hidden"  name="id" value="{{ $candidate->id }}">

                    <div class="form-group row">
  <label class="col-sm-2 col-form-label">Post</label>
                      <div class="col-md-2">
                      {{ Form::select('post_id',$posts,$candidate->post_id,["class"=>"form-control"]) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-md-2">
                        {{ Form::select('status', [1=>"Active",0=>"Disabled"], $candidate->status,["class"=>"form-control"]) }}
                      </div>

                    </div>
                    <div class="form-group row">

                      <div class="col-md-2">
                  <button type="submit" class="btn btn-btn-secondary">Update <i class="fa fa-fw fa-plus-circle"></i></button>
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

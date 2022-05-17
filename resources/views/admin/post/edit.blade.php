@extends('admin.layout.master')
@section('content')
  <!--Main container start -->
  	<main class="ttr-wrapper">
  		<div class="container-fluid">
  			<div class="db-breadcrumb">
  				<h4 class="breadcrumb-title">Post</h4>
  				<ul class="db-breadcrumb-list">
  					<li><a href="#"><i class="fa fa-home"></i>Post</a></li>
  					<li>Edit  Post</li>
  				</ul>
  			</div>
  			<div class="row">
  				<!-- Your Profile Views Chart -->
  				<div class="col-lg-12 m-b30">
  					<div class="widget-box">
  						<div class="wc-title">
  							<h4>Post</h4>

  						</div>
  						<div class="widget-inner">
                <form action="{{route('admin.post.update')}}" method="post" class="edit-profile m-b30">
                    @csrf
                    {{ method_field('PUT') }}
                <input class="form-control" type="hidden"  name="id" value="{{ $post->id }}">
  									<div class="form-group row">
  										<label class="col-sm-2 col-form-label">Post</label>
  										<div class="col-sm-7">
  											<input class="form-control" type="text" name="name" value="{{$post->name}}">
  										</div>
  									</div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-md-2">
                        {{ Form::select('status', [1=>"Active",0=>"Disabled"],$post->status,["class"=>"form-control"]) }}
                      </div>

                    </div>
                    <div class="form-group row">
                                        <div class="col-md-2">
                  <button type="submit" class="btn bg-secondary" name="submit">Update <i class="fa fa-fw fa-plus-circle"></i></button>
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

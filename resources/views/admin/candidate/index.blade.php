@extends('admin.layout.master')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Candidate</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                <li>Candidate</li><li>Mange Candidate</li>
            </ul>
        </div>
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-12">
                <ul class="nav nav-pills pl-0 pr-0 justify-content-end mb-4">

                    <li class="nav-item"><a class="nav-link"  href="{{route("admin.candidate.create")}}" role="tab" aria-selected="false">Add Candidate<i class="fa fa-fw fa-plus-circle"></i> </a></li>
                </ul>
            </div>



            <div class="col-lg-12 m-b30">
            <div class="widget-box">
              <div class="wc-title">
                  <h4>Candidates</h4>
                    </div>
                  <div class="widget-inner">

<div class="col-12">
    <ul class="nav nav-pills pl-0 pr-0 justify-content-start mb-4">

        <li class="nav-item "><a class="nav-link bg-danger"  href="{{route('admin.candidate.delete-all')}}" role="tab" aria-selected="false">Delete All <i class="fas fa-trash"></i> </a></li>
    </ul>
</div>
                      <div class="row justify-content-center m-t30">
                        <div class="col-md-10 text-center">

                          <table class="table">
                              <thead class="thead-dark">
                                <span class="count">{{count($candidates)}}</span>
                                  <tr scope="row">
                                    <th scope="col">Image</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Post</th>
                                      <th scope="col">Matric</th>
                                      <th scope="col">Level</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($candidates as $candidate)
                                  <tr>
  <td>
    @php($image=($candidate->image)?$candidate->image:'default.png')
<img style="height:75px;width:100px" src="{{asset('assets/images/candidates/'.$image)}}" alt="" class="rounded img-fluid center-block">
</td>
                                      <td>{{$candidate->name}}</td>
                                      <td>{{($candidate->post['name'])?$candidate->post['name']:"No Post"}}</td>
                                      <td>{{$candidate->candidate_id}}</td>
                                      <td>{{$candidate->level}}</td>
                                      <td>@if ($candidate->status)
                                        <span class="badge badge-primary ">Active</span>
                                      @else
                                        <span class="badge badge-danger ">Disabled</span>
                                      @endif</td>
                                      <td>
                                          <button onclick="window.location='{{route('admin.candidate.edit',$candidate->id)}}'" class="text-primary edit_student">
                                            <i class="fas fa-pen"></i></button>
                                          <form id="form-{{$candidate->id}}" action="{{route('admin.candidate.upload-image')}}" method="post" enctype="multipart/form-data" class="text-success">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$candidate->id}}">
                                            <label for="{{$candidate->id}}">
                                            <i class="fas fa-upload"></i>
                                            <input type="file" name="file" class="d-none  file" id="{{$candidate->id}}">
                                            </label>
                                          </form>
                                          <button class="text-danger"  onclick="window.location='{{route('admin.candidate.delete',$candidate->id)}}'"><i class="fas fa-trash"></i></button>
                                      </td>
                                  </tr>
                                @endforeach


                            </tbody>
                          </table>
                              </div>
                      </div>
                </div>

            </div>
            </div>
                      <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
<script type="text/javascript">
const file=document.querySelectorAll(".file")
file.forEach((e) => {
  e.onchange=()=>{
    console.log(e.parentElement.parentElement);
    e.parentElement.parentElement.submit()
  }

});


</script>
@endsection

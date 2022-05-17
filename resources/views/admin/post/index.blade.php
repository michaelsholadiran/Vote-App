@extends('admin.layout.master')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">post</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                <li>post</li><li>Manage post</li>
            </ul>
        </div>
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-12">
                <ul class="nav nav-pills pl-0 pr-0 justify-content-end mb-4">

                    <li class="nav-item"><a class="nav-link"  href="{{route("admin.post.create")}}" role="tab" aria-selected="false">Add post<i class="fa fa-fw fa-plus-circle"></i> </a></li>
                </ul>
            </div>



            <div class="col-lg-12 m-b30">
            <div class="widget-box">
              <div class="wc-title">
                  <h4>post</h4>
                    </div>
                  <div class="widget-inner">
                    <div class="col-12">
                        <ul class="nav nav-pills pl-0 pr-0 justify-content-start mb-4">

                            <li class="nav-item "><a class="nav-link bg-danger"  href="{{route('admin.post.delete-all')}}" role="tab" aria-selected="false">Delete All <i class="fas fa-trash"></i> </a></li>
                        </ul>
                    </div>
                      <div class="row justify-content-center m-t30">
                        <div class="col-md-10 text-center">

                          <table class="table">
                              <thead class="thead-dark">
                                <span class="count">{{count($posts)}}</span>
                                  <tr scope="row">
                                    <th scope="col">Name</th>
                                      <th scope="col">Status</th>
                                  <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($posts as $post)
                                  <tr>
                                      <td>{{$post->name}}</td>
                                      <td>@if ($post->status)
                                        <span class="badge badge-primary ">Active</span>
                                      @else
                                        <span class="badge badge-danger ">Disabled</span>
                                      @endif</td>

                                      <td>
                                        <button onclick="window.location='{{route('admin.post.edit',$post->id)}}'" class="text-primary edit_student"><i class="fas fa-pen"></i></button>
                                    <button class="text-danger"  onclick="window.location='{{route('admin.post.delete',$post->id)}}'"><i class="fas fa-trash"></i></button>
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
@endsection

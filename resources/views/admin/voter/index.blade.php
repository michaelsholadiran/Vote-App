@extends('admin.layout.master')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Voter</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                <li>Voter</li><li>Manage Voter</li>
            </ul>
        </div>
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-12">
                <ul class="nav nav-pills pl-0 pr-0 justify-content-end mb-4">

                    <li class="nav-item"><a class="nav-link"  href="{{route("admin.voter.create")}}" role="tab" aria-selected="false">Add Voter<i class="fa fa-fw fa-plus-circle"></i> </a></li>
                </ul>
            </div>



            <div class="col-lg-12 m-b30">
            <div class="widget-box">
              <div class="wc-title">
                  <h4>Voter</h4>
                    </div>
                  <div class="widget-inner">
                    <div class="col-12">
                        <ul class="nav nav-pills pl-0 pr-0 justify-content-start mb-4">

                            <li class="nav-item "><a class="nav-link bg-danger"  href="{{route('admin.voter.delete-all')}}" role="tab" aria-selected="false">Delete All <i class="fas fa-trash"></i> </a></li>
                        </ul>
                    </div>


                      <div class="row justify-content-center m-t30">
                        <div class="col-md-10 text-center">
                          <table class="table">
                              <thead class="thead-dark">
                                <span class="count">{{count($voters)}}</span>
                                  <tr scope="row">
                                      <th scope="col">Name</th>
                                      <th scope="col">Matric</th>
                                      <th scope="col">Level</th>
                                      <th scope="col">Status</th>

                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($voters as $voter)
                                  <tr>
                                      <td>{{$voter->name}}</td>
                                      <td>{{$voter->user_id}}</td>
                                      <td>{{$voter->level}}</td>
                                      <td>@if ($voter->status)
                                        <span class="badge badge-primary ">Active</span>
                                      @else
                                        <span class="badge badge-danger ">Disabled</span>
                                      @endif</td>
                                      <td>
                                            <button onclick="window.location='{{route('admin.voter.edit',$voter->id)}}'" class="text-primary edit_student"><i class="fas fa-pen"></i></button>
                                                                                <button class="text-danger"  onclick="window.location='{{route('admin.voter.delete',$voter->id)}}'"><i class="fas fa-trash"></i></button>
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
@endsection

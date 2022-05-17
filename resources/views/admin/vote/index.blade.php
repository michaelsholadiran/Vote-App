@extends('admin.layout.master')
@section('content')
<!--Main container start -->
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Manage Votes</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Manage Votes</a></li>
                <li>Add Manage Votes</li>
            </ul>
        </div>
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Manage Votes</h4>
                    </div>
                    <div class="widget-inner">
                                              <div class="col-lg-12 m-b30">
                            <div class="widget-box">
                                <div class="wc-title">
                                    <h4>vote</h4>
                                </div>
                                <div class="widget-inner">
                                    <div class="col-12">
                                        <ul class="nav nav-pills pl-0 pr-0 justify-content-start mb-4">

                                            <li class="nav-item "><a class="nav-link bg-danger" href="{{route("admin.vote.delete-all")}}" role="tab" aria-selected="false">Reset All <i class="fas fa-sync"></i> </a></li>
                                        </ul>

                                    </div>


                                    <div class="row justify-content-center m-t30">
                                        <div class="col-md-10 text-center">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <span class="count">{{count($votes)}}</span>
                                                    <tr scope="row">
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Matric</th>
                                                        <th scope="col">Level</th>
                                                        <th scope="col">Vote Status</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($votes as $vote)

                                                                              @php
                                                                              if($vote->voter['id']){
        $name=$vote->voter['name'];
        $uid=$vote->voter['user_id'];
        $id=$vote->voter['id'];
        $level=$vote->voter['level'];
                                                                              }else{
    $level=$uid=$name="UNKNOWN";
               $id=$vote->voter_id;
                    }
                            @endphp

                                                    <tr>
                                                        <td>{{$name}}</td>
                                                        <td>{{$uid}}</td>
                                                        <td>{{$level}}</td>
                                                        <td>
                                                            <span class="badge badge-success ">Voted</span>
                                                        </td>
                                                     <td>

                              <button class="text-danger" onclick="window.location='{{route('admin.vote.delete',$id )}}'"><i class="fas fa-sync"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <!-- Your Profile Views Chart END-->
                        </div>
                    </div>
</main>
@endsection

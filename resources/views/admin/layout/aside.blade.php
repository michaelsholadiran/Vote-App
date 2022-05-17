<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
  <div class="ttr-sidebar-wrapper content-scroll">
    <!-- side menu logo start -->
    <div class="ttr-sidebar-logo">
      <a href="#"><img alt="" src="{{ asset('assets/images/logo.png') }}" width="122" height="27"></a>
      <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
        <i class="material-icons ttr-fixed-icon">gps_fixed</i>
        <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
      </div> -->
      <div class="ttr-sidebar-toggle-button">
        <i class="ti-arrow-left"></i>
      </div>
    </div>
    <!-- side menu logo end -->
    <!-- sidebar menu start -->
    <nav class="ttr-sidebar-navi">
      <ul>
        <li>
          <a href="{{route('admin.dashboard')}}" class="ttr-material-button">
            <span class="ttr-icon"><i class="ti-home"></i></span>
                    <span class="ttr-label">Dashboard</span>
                  </a>
              </li>
        <li>

          <li>
            <a href="#" class="ttr-material-button">
              <span class="ttr-icon"><i class="ti-user"></i></span>
                      <span class="ttr-label">Candidate</span>
                      <span class="ttr-arrow-icon"><i class="far fa-angle-down"></i></span>
                    </a>
                    <ul>

                      <li>
                        <a href="{{route('admin.candidate.index')}}" class="ttr-material-button"><span class="ttr-label">Manage Candidate</span></a>
                      </li>
                      <li>
                        <a href="{{route('admin.candidate.create')}}" class="ttr-material-button"><span class="ttr-label">Add Candidate</span></a>
                      </li>
                      <li>
                        <a href="{{route('admin.candidate.bulk')}}" class="ttr-material-button"><span class="ttr-label">Add Bulk Candidate</span></a>
                      </li>

                    </ul>
                </li>
                <li>
                  <a href="#" class="ttr-material-button">
                    <span class="ttr-icon"><i class="ti-user"></i></span>
                            <span class="ttr-label">Voter</span>
                            <span class="ttr-arrow-icon"><i class="far fa-angle-down"></i></span>
                          </a>
                          <ul>

                            <li>
                              <a href="http://localhost/aavot/public/admin/dashboard/voters" class="ttr-material-button"><span class="ttr-label">Manage Voter</span></a>
                            </li>
                            <li>
                              <a href="http://localhost/aavot/public/admin/dashboard/voters/add" class="ttr-material-button"><span class="ttr-label">Add Voter</span></a>
                            </li>
                            <li>
                              <a href="{{route('admin.voter.bulk')}}" class="ttr-material-button"><span class="ttr-label">Add Bulk Voter</span></a>
                            </li>

                          </ul>
                      </li>
                      <li>
                        <a href="#" class="ttr-material-button">
                          <span class="ttr-icon"><i class="ti-calendar"></i></span>
                                  <span class="ttr-label">Post</span>
                                  <span class="ttr-arrow-icon"><i class="far fa-angle-down"></i></span>
                                </a>
                                <ul>

                                  <li>
                                    <a href="http://localhost/aavot/public/admin/dashboard/posts" class="ttr-material-button"><span class="ttr-label">Manage Post</span></a>
                                  </li>
                                  <li>
                                    <a href="http://localhost/aavot/public/admin/dashboard/posts/add" class="ttr-material-button"><span class="ttr-label">Add Post</span></a>
                                  </li>
                                  <li>
                                    <a href="{{route('admin.post.bulk')}}" class="ttr-material-button"><span class="ttr-label">Add Bulk Post</span></a>
                                  </li>

                                </ul>
                            </li>
                            <li>
            <a href="{{route('admin.dashboard.election_result')}}" class="ttr-material-button"><span class="ttr-icon"><i class="fas fa-poll-h"></i></span><span class="ttr-label">Election Result</span> </a>
          </li>
          <li>
<a href="{{route('admin.vote.index')}}" class="ttr-material-button"><span class="ttr-icon"><i class="fas fa-vote-yea"></i></span><span class="ttr-label">Manage Votes</span> </a>
</li>

              <li class="ttr-seperate"></li>
      </ul>
      <!-- sidebar menu end -->
    </nav>
    <!-- sidebar menu end -->
  </div>
</div>
<!-- Left sidebar menu end -->

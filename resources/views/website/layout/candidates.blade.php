
<section id="works" class="section">
  <div class="container clearfix">
    <h4>Elected Candidates</h4>
    <!-- portfolio filter -->
    <div class="row">
      <div id="filters" class="span12">
        <ul class="clearfix">
          <li>
            <a href="#" data-filter="*" class="active">
              <h5>All</h5>
            </a>
          </li>
  @foreach ($candidates as $c)
       <li>
         <a href="#" data-filter=".{{$c->post['name']}}">
           <h5>{{$c->post['name']}}</h5>
         </a>
       </li>
@endforeach
        </ul>
      </div>
      <!-- END PORTFOLIO FILTERING -->
    </div>
    <div class="row">
      <div class="span12">
        <div id="portfolio-wrap">
          <!-- portfolio item -->
          @foreach ($candidates as $c)
            @php($allCandidates=App\Candidate::where(['post_id'=>$c->post['id'],'status'=>1])->get())
            @foreach ($allCandidates as $c)

          <div class="portfolio-item grid print {{$c->post['name']}}">
            <div class="portfolio">
                @php($image=($c->image)?$c->image:'default.png')
              <a href="{{asset('assets/images/candidates/'.$image)}}" data-pretty="prettyPhoto[gallery1]" class="portfolio-image" style="text-align:center">
            <img src="{{asset('assets/images/candidates/'.$image)}}" alt="" style="width: 70%;
    height: 160px;"/>
          <div class="portfolio-overlay">
            <div class="thumb-info">
              <h5>{{$c->name}}</h5>
              <i class="icon-plus icon-2x"></i>
            </div>
          </div>
          </a>
            </div>
          </div>
        @endforeach
          @endforeach
          <!-- end portfolio item -->

        </div>
      </div>
    </div>
  </div>
</section>

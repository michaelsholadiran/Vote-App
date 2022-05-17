<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-dth, initial-scale=1">
  <title>Vote Panel</title>
  {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
  <link href="{{asset("website_assets")}}/vendors/multiform/css/sheet.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark d-flex justify-content-between">
      <div class=" text-white  order-md-0 dual-collapse2">
        CRU E-Vote
      </div>
      <div class="mr-5 order-0">
          <a class="navbar-brand mx-auto" href="#">Hi {{Auth::guard('voter')->user()->name}}</a>
          {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
              <span class="navbar-toggler-icon"></span>
          </button> --}}
      </div>
      <div class="order-3 ">
          <ul class="navbar-nav">
            <li class="nav-item active">
          <a class="nav-link"  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" href="#">Logout <span class="sr-only">(current)</span></a>
        </li>
        <form id="logout-form" action="{{ route('voter.logout') }}" method="GET" style="display: none;">
      @csrf
  </form>
          </ul>
      </div>
  </nav>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>





  <div class="page_wrapper container">
    <main id="main_content">

      <section class="col-12 col-md-8 mx-auto">
        <form action="{{route("website.vote.store")}}" id="msform" method="post">
          @csrf
          <!-- progressbar -->
          <ul id="progressbar">
                      @foreach ($candidates as $c)
              @if ($loop->index > 0)
                    <li>{{$c->post['name']}}</li>
              @else
                    <li class="active">{{$c->post['name']}}</li>
              @endif
            @endforeach

          </ul>

          <!-- fieldsets -->

@foreach ($candidates as $c)

  <fieldset class="col-12" data-post_name="{{$c->post['name']}}">
    <h2 class="fs-title text-white "><b>{{$c->post['name']}}</b></h2>

@php($allCandidates=App\Candidate::where(['post_id'=>$c->post['id'],'status'=>1])->get())


  @foreach ($allCandidates as $c)

    <div class="radiobtn">
        @php($image=($c->image)?$c->image:'default.png')
      <input type="radio" data-candidate_name="{{$c->name}}" data-candidate_image="{{$image}}" id="{{$c->id}}" name="{{$c->post['id']}}" value="{{$c->id}}" />
      <label for="{{$c->id}}">{{$c->name}}
        <span><img src="{{asset('assets/images/candidates/'.$image)}}" alt="" class="img-rounded center-block"></span>
      </label>
    </div>

  @endforeach
@if($loop->index >= 1)
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" class="next action-button" value="Next" disabled />
@else
    <input type="button" name="next" class="next action-button" value="Next" disabled />
@endif

  </fieldset>

@endforeach

          <fieldset style="width:100%; margin:0;" >
            <h2 class="fs-title text-white">Who You Have Voted For</h2>
          <div class="row">
        <div class="vote-preview col-12" id="preview-vote">


    </div>
</div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="submit" name="submit" id="submit-vote" class="submit action-button" value="Submit" />
          </fieldset>
        </form>
      </section>
    </main>
  </div>
</body>
<script src="{{asset("website_assets")}}/vendors/multiform/multiform.js"></script>
<script src="{{asset("website_assets")}}/vendors/multiform/main.js"></script>
<script type="module" src="{{asset("website_assets")}}/js/src/index.js"></script>
<script type="text/javascript">
let previewVote=document.getElementById('preview-vote')
  let fieldset=document.querySelectorAll("fieldset")
fieldset[fieldset.length-2].onclick=function(){
    previewVote.innerHTML=""
let fieldset=document.querySelectorAll("fieldset")
fieldset.forEach((w) => {

  if(w.dataset.post_name != undefined){
    let input=  w.querySelectorAll('input')
    input.forEach((y) => {
      if(y.checked==true){
        let innerData=`
          <div class="col-12 row justify-content-between text-white">
        <img width="100" height="100" src="{{asset("assets/images/candidates")}}/${y.dataset.candidate_image}" alt="" class="img-responsive rounded-circle">
    <div class="text">
    <h2>${w.dataset.post_name}</h2>
    <h4>${y.dataset.candidate_name}</h4>
</div></div>`
              var container=document.createElement("DIV")
        container.className="card col-12 p-2 mb-2  bg-secondary"
        container.innerHTML=innerData
            var q=previewVote.append(container)
console.log(previewVote);
      }
    })
  }
})
}


function getMessage() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':$('input[name="_token"]').val()
    }
});
           $.ajax({
              type:'POST',
              url:'{{route('voter.activity')}}',
              data:'user_id={{Auth::id()}} ',
              error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  console.log(err.message);
},
              success:function(data) {
                // console.log('ok');

              }
           });
        }
        setInterval(()=>{
          getMessage()
        },5000)

</script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">

</script>
</html>

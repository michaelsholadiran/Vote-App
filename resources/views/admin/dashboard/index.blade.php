@extends('admin.layout.master')
@section('content')
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>
			<!-- Card -->
			<div class="row" >
      <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg1">
          <div class="wc-item">
            <h4 class="wc-title">Candidates</h4>
            <span class="wc-des">Total Candidates</span>
            <span class="card_icon"><i class="fas fa-users"></i></span>

            <span class="wc-stats counter" id="candidates" data-count="15">{{$counts['candidates']  }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg4">
          <div class="wc-item">
            <h4 class="wc-title">
              Voters
            </h4> <span class="wc-des">
              Total Active Voters
            </span> <span class="card_icon"><i class="fas fa-users"></i></span>
            <span class="wc-stats counter" id="voters" data-count="5">
            {{$counts['voters']  }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg4">
          <div class="wc-item">
            <h4 class="wc-title">
              Posts
            </h4> <span class="wc-des">
              Total Active Posts
            </span>
            <span class="card_icon"><i class="fas fa-clipboard"></i></span>
            <span class="wc-stats counter" id="posts" data-count="13">
            {{$counts['posts'] }}</span>
          </div>
        </div>
      </div>
			<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
				<div class="widget-card widget-bg4">
					<div class="wc-item">
						<h4 class="wc-title">
						Voted
						</h4> <span class="wc-des">
							Total Active Posts
						</span>
						<span class="card_icon"><i class="fas fa-clipboard"></i></span>
					<span class="wc-stats counter" id="posts" >
						{{$counts['votedCount']}} of {{$counts['voters']}} </span>
					</div>
				</div>
			</div>

    </div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-8 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Leading Candidates</h4>
							</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="45"></canvas>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
				<div class="col-lg-4 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Active Voters</h4>
						</div>
						<div class="widget-inner">
							<div class="noti-box-list">
								<ul id="list-box">



								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
@endsection

@section('script')
	<script type="text/javascript">
	var displayGraph = function(label,data,element) {
			Chart.defaults.global.defaultFontFamily = "rubik";
		Chart.defaults.global.defaultFontColor = '#999';
		Chart.defaults.global.defaultFontSize = '12';
		var ctx = document.getElementById(element).getContext('2d');
		var chart = new Chart(ctx, {
			type: 'bar', // The data for our dataset

			data: {
				labels:label, // Information about the dataset
				datasets: [{
					label: "Views",
					backgroundColor: 'rgba(0,0,0,0.05)',
					borderColor: '#4c1864',
					borderWidth: "3",
					data: data,
					pointRadius: 4,
					pointHoverRadius: 4,
					pointHitRadius: 10,
					pointBackgroundColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointBorderWidth: "3",
				}]
			}, // Configuration options
			options: {
				layout: {
					padding: 0,
				},
				legend: {
					display: false
				},
				title: {
					display: false
				},
				scales: {
					yAxes: [{
						scaleLabel: {
							display: false
						},
						gridLines: {
							borderDash: [6, 6],
							color: "#ebebeb",
							lineWidth: 1,
						},
					}], yAxes: [{
						ticks: {
							 fixedStepSize: 1
					 }
         }],
					xAxes: [{
						scaleLabel: {
							display: false
						},
						gridLines: {
							display: false
						},
					}],
				},
				tooltips: {
					backgroundColor: '#333',
					titleFontSize: 12,
					titleFontColor: '#fff',
					bodyFontColor: '#fff',
					bodyFontSize: 12,
					displayColors: false,
					xPadding: 10,
					yPadding: 10,
					intersect: false
				}
			},
		});
	}
	@php ($label = [])
	@php ($data = [])

	@foreach($posts as $p)

	@php($count=DB::table('votes')->select(['candidate_id',DB::raw('count(candidate_id) AS counts ')])->groupBy('candidate_id')->where("post_id",$p->id)->orderBy('counts','DESC')->first())

	@php (array_push($label,$p->name))
	@if($count)
		@php (array_push($data,$count->counts))
		@else
			@php (array_push($data,0))
	@endif


	@endforeach

	var data= '{{implode(",",$data)}}'.split(',');
	var label= '{{implode(",",$label)}}'.split(',');

	displayGraph(label,data,"chart");




	let con=$('#list-box');

	function getMessage() {

	           $.ajax({
	              type:'get',
	              url:'{{route('check.activity')}}',

	              error: function(xhr, status, error) {
	  var err = eval("(" + xhr.responseText + ")");
	  console.log(err.message);
	},
	              success:function(data) {
					con.html("")
	data.msg.forEach((item) => {
		// con.html("")
		let q=`
		<span class="notification-icon dashbg-green">
		<i class="fa fa-check"></i>
		</span>
		<span class="notification-text">
		<span>${item}</span><br> Active.
		</span>
		<span class="notification-time">
		<a href="#" class="fa fa-close"></a>
		<span>Now</span>
		</span>
		`;

	let newDiv=document.createElement("li");
		newDiv.innerHTML+=q;

			con.append(newDiv)
	});
	              }
	           });
	        }
	        setInterval(()=>{

				          getMessage()

	        },5000)

	</script>

@endsection

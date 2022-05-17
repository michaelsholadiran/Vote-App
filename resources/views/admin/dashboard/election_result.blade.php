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
							<div class="row">
				<!-- Your Profile Views Chart -->
				
			@foreach ($posts as $p)
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>{{ $p->name }}</h4>
						</div>
						<div class="widget-inner">
							<canvas id="{{$p->id}}" width="100" height="45"></canvas>
						</div>
					</div>
				</div>
			@endforeach

				<!-- Your Profile Views Chart END-->

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
	@foreach($posts as $p)
	@php ($label = [])
	@php ($data = [])
	@foreach ($candidates as $c)
	@if ($c->post_id == $p->id)
	@php (array_push($label,$c->name))
@php ($x=DB::table('votes')->select('id')->where("candidate_id",$c->id)->get()->count())
	@php (array_push($data,$x))
	@endif
	@endforeach
	var datat='{{implode(",",$data)}}'
	var data= datat.split(',')
	// var data=[196, 132, 215, 362, 210, 252]
	var canVal= '{{implode(",",$label)}}';
	var label= canVal.split(',');



	// var label= ["January", "February", "March", "April", "May", "June"];
	var element= "{{$p->id}}";
	displayGraph(label,data,element);
	@endforeach
	</script>
@endsection

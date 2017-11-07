@extends('layout')
@section('page-style')
<style media="screen">
select{
	font-weight: bolder;
}
.thumbnail{
	border:none;
	background-color:#ffffff;
}
.caption > h4{
	margin:0px;
	color: green;
	font-weight: bolder;
}
</style>
@stop
@section('content')
<div class="row" style="padding-top:1em">
	<div class="col-md-8 col-md-offset-2">
		<div class="form-group col-md-3">
			<select class="form-control" name="continent">
				<<option value="">Select</option>
				@forelse($continents as $continent)
					<option value="{{$continent->id}}">{{ucfirst($continent->name)}}</option>
				@empty
					<option value="">No Continent</option>
				@endforelse
			</select>
		</div>
		<div class="form-group col-md-3">
			<select class="form-control" name="country">
				
			</select>
		</div>
	</div>
	<div id="hotels">
	@forelse($hotels as $index=>$hotel)
		
			<div class="col-md-4 {{$index%2==0 ? 'col-md-offset-2' : 'col-md-offset-1'}}">
				<div class="thumbnail">
					<img src="{{$hotel->image}}" alt="{{$hotel->title}}" style="height:15em;">
					<div class="caption">
						<h4>{{$hotel->title}}</h4>
						<p><?php
							$string = strip_tags($hotel->description);
							if (strlen($string) > 100) {
								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
							}
						
						?></p>
						<p style='text-align:justify'>{{$string}}<a href="#">More Details</a></p>
					</div>
				</div>
			</div>
		
	@empty
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info">
				<h2>Sorry! No Hotels Found...!!</h2>
			</div>
		</div>
	@endforelse
	</div>
	<!-- <div class="col-md-4 col-md-offset-2">
		<div class="thumbnail">
			<img src="https://ridespots.com/wp-content/uploads/2016/10/North_Vancouver_Ridespots_Slider_Drop-1600x500.jpg" alt="">
			<div class="caption">
				<h3>Thumbnail label</h3>
				<p>...</p>
				<p><a href="#">More Details</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-1">
		<div class="thumbnail">
			<img src="https://ridespots.com/wp-content/uploads/2016/10/North_Vancouver_Ridespots_Slider_Drop-1600x500.jpg" alt="">
			<div class="caption">
				<h3>Thumbnail label</h3>
				<p>...</p>
				<p><a href="#">More Details</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-2">
		<div class="thumbnail">
			<img src="https://ridespots.com/wp-content/uploads/2016/10/North_Vancouver_Ridespots_Slider_Drop-1600x500.jpg" alt="">
			<div class="caption">
				<h3>Thumbnail label</h3>
				<p>...</p>
				<p><a href="#">More Details</a></p>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-md-offset-1">
		<div class="thumbnail">
			<img src="https://ridespots.com/wp-content/uploads/2016/10/North_Vancouver_Ridespots_Slider_Drop-1600x500.jpg" alt="">
			<div class="caption">
				<h3>Thumbnail label</h3>
				<p>...</p>
				<p><a href="#">More Details</a></p>
			</div>
		</div>
	</div> -->
</div>
@stop
@section('page-script')
<script type="text/javascript">
$(document).ready(function() {
	$('select[name="continent"]').on('change', function() {
		var continentID = $(this).val();
		if(continentID) {
			$.ajax({
				url: '/ajax/get-country/'+continentID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					$('select[name="country"]').empty();
					$('select[name="country"]').append('<option value="">Select</option>');
					$.each(data, function(key, value) {
						$('select[name="country"]').append('<option value="'+ key +'">'+ value +'</option>');
					});
				}
			});
		}else{
			$('select[name="country"]').empty();
		}
	});
	$('select[name="country"]').on('change', function() {
		var continentID = $('select[name="continent"]').val();
		var countryID = $(this).val();
		if(continentID && countryID) {
			$.ajax({
				url: '/gethotels/'+continentID+'/'+countryID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					if(data.status=="success"){
						$('#hotels').html(data.result);
					}
				}
			});
		}else{
		alert('error');
		}
	});
});
</script>
@stop

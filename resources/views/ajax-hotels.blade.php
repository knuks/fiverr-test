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

@extends('layouts.app') 
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header" style="color:red;">Home</div>
				<div class="card-body">
					@foreach($asks as $value)
						<div class="col-12">
							<div class="single-asks">
								<div class="row">
									<div class="col-md-12">
										<p>
											<strong>
												<a href="{{ url('/asks/detail/' . $value->id .'/'.$value->amount_view.'/'.$value->user_id.'/'.$value->score.'/'. $value->is_approved) }}">{{ $value->title }}</a>
												<br/>
												<span class='small text-muted'>Ask by {{ $value->name }}, at {{ $value->created_at }}, have {{ $value->amount_view }} amount view and score are {{$value->score}}.</span>
											</strong>
										</p>
										<a>{{ $value->title }}
											<i class="fa fa-angle-right"></i>
										</a>
										<hr/>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
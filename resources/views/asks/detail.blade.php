@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">{{ $ask->title }}</div>
				<div class="card-body">
					<p>{!! $ask->content !!}</p>
				</div>
			</div>
		</div>
	</div>
@endsection
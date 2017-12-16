@extends('layouts.app') @section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">{{ $ask->title }}</div>
			<div class="card-body">
				<p>{!! $ask->content !!}</p>
			</div>
		</div>
		<br/>
		<div class="card-header" style="color:red;">Your answer here</div>
		<div class="card-body">
			<form action="{{ url('/answer/add') }}" method="GET">
				{{ csrf_field() }}
                    <div class="form-group">
						<div class="form-group">
							<textarea class="ckeditor form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" name="content" placeholder=""
								required></textarea>
							@if($errors->has('content'))
							<div class="invalid-feedback">
								<strong>{{ $errors->first('content') }}</strong>
							</div>
							@endif
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Post your answer</button>
                    </div>
			</form>
		</div>
	</div>
</div>
@if($errors->has('content')) $('#myModal').modal('show'); @endif
@endsection
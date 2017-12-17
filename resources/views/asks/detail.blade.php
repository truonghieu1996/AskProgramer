@extends('layouts.app') @section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<input type="hidden" id="ID_Question" name="ID_Question" value="{{$ask->id}}" />
			<div class="card-header">{{ $ask->title }}
				<div class="form-group row">
					<div class="col-2">
						Score<input class="form-control" type="number" value="{{$ask->score}}" id="score">
					</div>
				</div>
			</div>
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
					<button type="submit" class="btn btn-dark">Post your answer</button>
				</div>
			</form>
		</div>
	</div>
</div>
@if($errors->has('content')) $('#myModal').modal('show'); @endif 
@endsection
@section('javascript')
	<script type="text/javascript">
		$(document).ready(function() {
			$("#score").on("click",function(event){
				event.preventDefault();
				var score = $("#score").val();
				var id_question = $("#ID_Question").val();
				if(!isNaN(score) && score != ''){
					$.ajax({
						type: "GET",
						url:'{{ url('/asks/update/score') }}',
						data: {score: score, id_question: id_question},
						success: function() {}
					});
				}
			});
		});
	</script>
@endsection
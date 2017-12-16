@extends('layouts.app')

@section('content')
	@section('content')
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Asks</div>
				<div class="card-body">
					<table id="DataList" class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="15%">Category</th>
								<th width="50%">Title</th>
								<th width="15%">Is approved</th>
								<th width="10%">Detail</th>
								<th width="5%">Delete</th>
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($asks as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td class="text-center">{{ $value->name_category }}</td>
									<td>{{ $value->title }}<br /><span class='small text-muted'>Post by {{ $value->name }}, have {{ $value->amount_view }} amount view and score is {{ $value->score}}.</span></td>
									<td class="text-center">
										@if($value->is_approved == 1)
											<a href="{{ url('/news/' . $value->id . '/approved/0') }}"><span class="badge badge-success">Approved</span></a>
										@else
											<a href="{{ url('/news/' . $value->id . '/approved/1') }}"><span class="badge badge-warning">Not approved</span></a>
										@endif
									</td>
									<td class="text-center">
										<a href="{{ url('/news/detail/' . $value->id .'/'.$value->amount_view.'/'.$value->user_id) }}" class="btn btn-warning btn-sm" style="width:40px;">Xem</a>
									</td>
									<td class="text-center">
										<a data-toggle="modal" data-target="#myModalDelete" onclick="getDelete({{ $value->id }}); return false;" class="btn btn-danger btn-sm"
											style="width:40px;">Xóa</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <form action="{{ url('/categories/add') }}" method="post">
		{{ csrf_field() }}
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel">Add category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name_category">Name category<span class="text-danger font-weight-bold">*</span></label>
							<input type="text" class="form-control{{ $errors->has('name_category') ? ' is-invalid' : '' }}" id="name_category" name="name_category" value="{{ old('name_category') }}" placeholder="" required />
							@if($errors->has('name_category'))
								<div class="invalid-feedback"><strong>{{ $errors->first('name_category') }}</strong></div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</div>
			</div>chude
		</div>
	</form>

    <form action="{{ url('/categories/delete') }}" method="get">
		{{ csrf_field() }}
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabelDelete">Delete category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p class="font-weight-bold text-danger">Are you sure delete this ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</form>

    <form action="{{ url('/categories/update') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" id="ID_edit" name="ID_edit" value="" />
		<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabelEdit">Update category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name_category_edit">Name category<span class="text-danger font-weight-bold">*</span></label>
							<input type="text" class="form-control{{ $errors->has('name_category_edit') ? ' is-invalid' : '' }}" id="name_category_edit" name="name_category_edit" value="{{ old('name_category_edit') }}" placeholder="" required />
							@if($errors->has('name_category_edit'))
								<div class="invalid-feedback"><strong>{{ $errors->first('name_category_edit') }}</strong></div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	@if($errors->has('name_category'))
		$('#myModal').modal('show');
	@endif
	
	@if($errors->has('name_category_category_edit'))
		$('#myModalEdit').modal('show');
	@endif
@endsection

@section('javascript')
	<script type="text/javascript">
		function getUpdate(id, name_category) {
			$('#ID_edit').val(id);
			$('#name_category_edit').val(name_category);
		}
		
		function getDelete(id) {
			$('#ID_delete').val(id);
		}
	</script>
@endsection
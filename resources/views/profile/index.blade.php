@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header" style="color:red;">Information your profile</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th width="40%">Full name</th>
								<th width="40%">Email</th>
								<th width="15%">Role</th>
								<th width="5%">Edit</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
                                    @if($user->role == 1)
                                        Adminstrator
                                    @else
                                        user
                                    @endif
                                </td>
								<td class="text-center"><a href="#sua" data-toggle="modal" data-target="#myModalEdit" onclick="getUpdate({{ $user->id }}, '{{ $user->name }}'); return false;" class="btn btn-warning btn-sm" style="width:40px;">edit</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <form action="{{ url('/profile/update') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" id="ID_edit" name="ID_edit" value="" />
		<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabelEdit">Update full name</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="name_edit">Full name<span class="text-danger font-weight-bold">*</span></label>
							<input type="text" class="form-control{{ $errors->has('name_edit') ? ' is-invalid' : '' }}" id="name_edit" name="name_edit" value="{{ old('name_edit') }}" placeholder="" required />
							@if($errors->has('name_edit'))
								<div class="invalid-feedback"><strong>{{ $errors->first('name_edit') }}</strong></div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-dark">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('javascript')
	<script type="text/javascript">
		function getUpdate(id, name) {
			$('#ID_edit').val(id);
			$('#name_edit').val(name);
		}
	</script>
	@if($errors->has('name'))
		$('#myModal').modal('show');
	@endif
	
	@if($errors->has('name_edit'))
		$('#myModalEdit').modal('show');
	@endif
@endsection
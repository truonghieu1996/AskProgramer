<?php $__env->startSection('content'); ?>
	<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header" style="color:red;">Asks</div>
				<div class="card-body">
					<table id="DataList" class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th class="text-center" width="5%">#</th>
								<th class="text-center" width="15%">Category</th>
								<th class="text-center" width="50%">Title</th>
								<th class="text-center" width="15%">Is approved</th>
								<th class="text-center" width="10%">Detail</th>
								<th class="text-center" width="5%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  $count = 1;  ?>
							<?php $__currentLoopData = $asks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($count++); ?></td>
									<td class="text-center"><?php echo e($value->name_category); ?></td>
									<td><?php echo e($value->title); ?><br /><span class='small text-muted'>Post by <?php echo e($value->name); ?>, have <?php echo e($value->amount_view); ?> amount view and score is <?php echo e($value->score); ?>.</span></td>
									<td class="text-center">
										<?php if($value->is_approved == 1): ?>
											<a href="<?php echo e(url('/asks/' . $value->id . '/approved/0')); ?>"><span class="badge badge-success">Approved</span></a>
										<?php else: ?>
											<a href="<?php echo e(url('/asks/' . $value->id . '/approved/1')); ?>"><span class="badge badge-warning">Not approved</span></a>
										<?php endif; ?>
									</td>
									<td class="text-center">
										<a href="<?php echo e(url('/asks/detail/' . $value->id .'/'.$value->amount_view.'/'.$value->user_id.'/'.$value->score.'/'. $value->is_approved)); ?>" class="btn btn-warning btn-sm" style="width:40px;">View</a>
									</td>
									<td class="text-center">
										<a data-toggle="modal" data-target="#myModalDelete" onclick="getDelete(<?php echo e($value->id); ?>); return false;" class="btn btn-danger btn-sm"
											style="width:40px;">Delete</a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <form action="<?php echo e(url('/categories/add')); ?>" method="post">
		<?php echo e(csrf_field()); ?>

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
							<input type="text" class="form-control<?php echo e($errors->has('name_category') ? ' is-invalid' : ''); ?>" id="name_category" name="name_category" value="<?php echo e(old('name_category')); ?>" placeholder="" required />
							<?php if($errors->has('name_category')): ?>
								<div class="invalid-feedback"><strong><?php echo e($errors->first('name_category')); ?></strong></div>
							<?php endif; ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-dark">Add</button>
					</div>
				</div>
			</div>chude
		</div>
	</form>

    <form action="<?php echo e(url('/categories/delete')); ?>" method="get">
		<?php echo e(csrf_field()); ?>

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

    <form action="<?php echo e(url('/categories/update')); ?>" method="post">
		<?php echo e(csrf_field()); ?>

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
							<input type="text" class="form-control<?php echo e($errors->has('name_category_edit') ? ' is-invalid' : ''); ?>" id="name_category_edit" name="name_category_edit" value="<?php echo e(old('name_category_edit')); ?>" placeholder="" required />
							<?php if($errors->has('name_category_edit')): ?>
								<div class="invalid-feedback"><strong><?php echo e($errors->first('name_category_edit')); ?></strong></div>
							<?php endif; ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php if($errors->has('name_category')): ?>
		$('#myModal').modal('show');
	<?php endif; ?>
	
	<?php if($errors->has('name_category_category_edit')): ?>
		$('#myModalEdit').modal('show');
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		function getUpdate(id, name_category) {
			$('#ID_edit').val(id);
			$('#name_category_edit').val(name_category);
		}
		
		function getDelete(id) {
			$('#ID_delete').val(id);
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
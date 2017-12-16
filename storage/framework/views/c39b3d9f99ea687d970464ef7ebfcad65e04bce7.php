 
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">My asks</div>
				<div class="card-body">
                <form action="<?php echo e(url('/asks/myasks/add')); ?>" method="GET">
                    <p>
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-plus" aria-hidden="true"></i> Ask question</button>
					</p>
                </form>
					<table id="DataList" class="table table-bordered table-hover table-sm table-responsive">
						<thead>
							<tr>
								<th class="text-center" width="5%">#</th>
								<th class="text-center" width="10%">Category</th>
								<th class="text-center" width="20%">Title</th>
								<th class="text-center" width="12%">Date created</th>
								<th class="text-center" width="12%">Date updated</th>
								<th class="text-center" width="10%">Is approved</th>
								<th class="text-center" width="10%">Detail</th>
								<th class="text-center" width="8%">Edit</th>
								<th class="text-center" width="8%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$count = 1;
							 ?> 
								<?php $__currentLoopData = $myquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($count++); ?></td>
									<td class="text-center"><?php echo e($value->name_category); ?></td>
									<td><?php echo e($value->title); ?>

										<br/>
										<span class='small text-muted'></span>
									</td>
									<td><?php echo e($value->created_at); ?></td>
									<td><?php echo e($value->updated_at); ?></td>
									<td class="text-center">
										<?php if($value->is_approved == 1): ?>
										<span class="badge badge-success">Approved</span>
										<?php else: ?>
										<span class="badge badge-warning">Not approved</span>
										<?php endif; ?>
									</td>
									<td class="text-center">
										<a href="<?php echo e(url('/asks/detail/' . $value->id .'/'.$value->amount_view.'/'.$value->user_id)); ?>" class="btn btn-warning btn-sm"
											style="width:40px;">View</a>
									</td>
									<td class="text-center">
										<a href="<?php echo e(url('/asks/myasks/update/' . $value->id)); ?>" class="btn btn-warning btn-sm"
											style="width:40px;">Edit</a>
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

	<form action="<?php echo e(url('/asks/myasks/delete')); ?>" method="get">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabelDelete">Delete aks this ?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
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
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		function getDelete(id) {
			$('#ID_delete').val(id);
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
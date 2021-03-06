 
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header" style="color:red;">Aks Questions</div>
				<table id="DataList" class="table table-bordered table-hover table-sm table-responsive">
					<div class="card-body">
						<?php $__currentLoopData = $asks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-12">
								<div class="single-asks">
									<div class="row">
										<div class="col-md-12">
											<p>
												<strong>
													<a href="<?php echo e(url('/asks/detail/' . $value->id .'/'.$value->amount_view.'/'.$value->user_id.'/'.$value->score.'/'. $value->is_approved)); ?>"><?php echo e($value->name_category); ?> <i class="fa fa-angle-right"></i> </a>
												</strong>
											</p>
											<a><?php echo e($value->title); ?></a>
											<br/>
											<span class='small text-muted'>Ask by <?php echo e($value->name); ?>, at <?php echo e($value->created_at); ?>, have <?php echo e($value->amount_view); ?> amount view and score is <?php echo e($value->score); ?>.</span>
											<hr/>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
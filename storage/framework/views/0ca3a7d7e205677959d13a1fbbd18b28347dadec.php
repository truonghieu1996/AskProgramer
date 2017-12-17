 <?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<input type="hidden" id="ID_Question" name="ID_Question" value="<?php echo e($ask->id); ?>" />
			<div class="card-header"><?php echo e($ask->title); ?>

				<div class="form-group row">
					<div class="col-2">
						Score<input class="form-control" type="number" value="<?php echo e($ask->score); ?>" id="score">
					</div>
				</div>
			</div>
			<div class="card-body">
				<p><?php echo $ask->content; ?></p>
			</div>
		</div>
		<br/>
		<div class="card-header" style="color:red;">Your answer here</div>
		<div class="card-body">
			<form action="<?php echo e(url('/answer/add')); ?>" method="GET">
				<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<div class="form-group">
						<textarea class="ckeditor form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>" id="content" name="content" placeholder=""
						    required></textarea>
						<?php if($errors->has('content')): ?>
						<div class="invalid-feedback">
							<strong><?php echo e($errors->first('content')); ?></strong>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-dark">Post your answer</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php if($errors->has('content')): ?> $('#myModal').modal('show'); <?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#score").on("click",function(event){
				event.preventDefault();
				var score = $("#score").val();
				var id_question = $("#ID_Question").val();
				if(!isNaN(score) && score != ''){
					$.ajax({
						type: "GET",
						url:'<?php echo e(url('/asks/update/score')); ?>',
						data: {score: score, id_question: id_question},
						success: function() {}
					});
				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
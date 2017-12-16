 <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" style="color:red;">Update ask question</div>
            <div class="card-body">
                <form action="<?php echo e(url('/asks/myasks/update')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" id="ID_edit" name="ID_edit" value="<?php echo e($ask->id); ?>" />
                    <div class="form-group">
                        <div class="form-group">
                            <label for="title_edit">Title
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
                            <input type="text" class="form-control<?php echo e($errors->has('title_edit') ? ' is-invalid' : ''); ?>" id="title_edit" name="title_edit"
                                value="<?php echo e($ask->title); ?>" placeholder="" required /> <?php if($errors->has('title_edit')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('title_edit')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="category_id_edit">Category
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
                            <select class="form-control<?php echo e($errors->has('category_id_edit') ? ' is-invalid' : ''); ?>" id="category_id_edit" name="category_id_edit"
                                required>
                                <option value="">--Select category--</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('category_id_edit')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('category_id_edit')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="content_edit">Content
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
                            <textarea class="ckeditor form-control<?php echo e($errors->has('content_edit') ? ' is-invalid' : ''); ?>" id="content_edit" name="content_edit"
                                placeholder="" required><?php echo e($ask->content); ?></textarea>
                            <?php if($errors->has('content_edit')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('content_edit')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if($errors->has('title_edit')): ?> $('#myModal').modal('show');<?php endif; ?> <?php if($errors->has('content_edit')): ?> $('#myModal').modal('show');
<?php endif; ?> <?php if($errors->has('summary_edit')): ?> $('#myModal').modal('show'); <?php endif; ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    document.getElementById("category_id_edit").value = "<?php echo $ask->category_id;?>";
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
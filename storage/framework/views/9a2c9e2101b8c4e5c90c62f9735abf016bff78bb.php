 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" style="color:red;">Add ask question</div>
            <div class="card-body">
                <form action="<?php echo e(url('/asks/myasks/add')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="title">Title
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
                            <input type="text" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" id="title" name="title" value=""
                                placeholder="" required /> <?php if($errors->has('title')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
                            <select class="form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" id="category_id" name="category_id" required>
                                <option value="">--Select category--</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name_category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('category_id')): ?>
                            <div class="invalid-feedback">
                                <strong><?php echo e($errors->first('category_id')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Content ask
                                <span class="text-danger font-weight-bold">*</span>
                            </label>
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
                        <button type="submit" class="btn btn-primary">Ask</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if($errors->has('title')): ?> $('#myModal').modal('show');<?php endif; ?> <?php if($errors->has('content')): ?> $('#myModal').modal('show'); <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', __('Coupon')); ?>
<?php $__env->startSection('action', __('Create')); ?>

<?php $__env->startSection('content'); ?>

    <main id="main" class="main">
        <?php echo $__env->make('Admin.layout.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make('Admin.layout.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create Coupon</h5>
                            <!-- Horizontal Form -->
                            <form action="<?php echo e(route('coupon.store')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Coupon Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name">

                                        <?php if($errors->has('name')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('name')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>

                                    <div class="col-sm-10">

                                        <select class="form-control" name="type">
                                            <option value="1">Fixed</option>
                                            <option value="2">Percentage</option>
                                        </select>

                                        <?php if($errors->has('type')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('type')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Percentage/Amount</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="percentage">

                                        <?php if($errors->has('percentage')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('percentage')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Expire At</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="expire_at" name="expire_at">

                                        <?php if($errors->has('expire_at')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('expire_at')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-10">
                                        <select class="form-control js-example-tags"  name="user_id">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('user_id')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('	user_id')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div> 



                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Admin/Coupons/create.blade.php ENDPATH**/ ?>
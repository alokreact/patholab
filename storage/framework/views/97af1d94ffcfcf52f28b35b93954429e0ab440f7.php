
<?php $__env->startSection('title', __('GroupTest')); ?>
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
                            <h5 class="card-title">Group Test</h5>

                            <!-- Horizontal Form -->
                            <form action="<?php echo e(route('grouptest.store')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Group Test Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name">

                                        <?php if($errors->has('name')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('name')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                


                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Test</label>
                                    <div class="col-sm-10">
                                        <select class="form-control js-example-tags" multiple="multiple" name="sub_tests[]">
                                            <?php $__currentLoopData = $sub_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                                                <option value="<?php echo e($subtest->id); ?>"><?php echo e($subtest->sub_test_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('sub_tests')): ?>
                                            <strong style="color:red"> <?php echo e($errors->first('	sub_tests')); ?></strong>
                                        <?php endif; ?>
                                    </div>
                                </div> 



                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1">
                                            <label class="form-check-label" for="gridRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0">
                                            <label class="form-check-label" for="gridRadios2">
                                                Inactive
                                            </label>
                                        </div>

                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <strong style="color:red"><?php echo e($message); ?></strong>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </fieldset>
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

<?php echo $__env->make('Admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Admin/GroupTest/create.blade.php ENDPATH**/ ?>
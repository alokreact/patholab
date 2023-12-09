
<?php $__env->startSection('title', __('Coupon')); ?>
<?php $__env->startSection('action', __('List')); ?>
<?php $__env->startSection('content'); ?>
    <main id="main" class="main">
        <?php echo $__env->make('Admin.layout.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List</h5>

                            <!-- Default Table -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Coupon Code</th>
                                        <th>Coupon Name</th>
                                        <th>Coupon Type</th>
                                        <th>Coupon Amount/Percntage</th>
                                        <th>Expire At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(count($coupons) > 0): ?>
                                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($coupon->code); ?></td>
                                                <td><?php echo e($coupon->name); ?></td>
                                                <td><?php echo e($coupon->type === '1' ? 'Fixed' : 'Percentage'); ?></td>
                                                <td><?php echo e($coupon->amount); ?><?php echo e($coupon->type === '1' ? '/-' : '%'); ?></td>
                                                <td><?php echo e($coupon->expires_at); ?></td>

                                                <td>
                                                    <a href="#">
                                                        <button type="button" class="btn btn-success"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </a>
                                                    <form action="#" method="post" style="display:inline"><?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger ml-3"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- View Modal -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <td>No coupons to display</td>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Admin/Coupons/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', __('Users')); ?>
<?php $__env->startSection('action', __('List')); ?>

<main id="main" class="main">
    <?php echo $__env->make('Admin.layout.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                   <?php echo $__env->make('Admin.layout.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(count($users) > 0): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->phone); ?></td>
                                            <td> <?php echo e($user->email); ?></td>
                                         
                                            
                                            <td>
                                                <a href="<?php echo e(route('user.edit',[$user->id])); ?>"
                                                    class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                                <form action="#"
                                                    method="post" style="display:inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger ml-3">
                                                        <i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- View Modal -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <td>No Users Found!</td>
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

<?php echo $__env->make('Admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Admin/Users/list.blade.php ENDPATH**/ ?>
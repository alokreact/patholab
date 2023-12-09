
<?php $__env->startSection('content'); ?>

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Cart</h1>

                        <span class="text-white">Order Overview</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                <div class="row">
                                    <table id="cart" class="table table-hover table-condensed cart-table">
                                        <thead>
                                            <tr>
                                                <th style="width:30%">Package Name</th>
                                                <th style="width:20%">Lab Name</th>
                                                <th style="width:10%">Price</th>
                                                <th style="width:8%">Quantity</th>
                                                <th style="width:22%" class="text-center">Subtotal</th>
                                                <th style="width:10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if($products->count() > 0): ?>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr data-id="<?php echo e($id); ?>">
                                                        <td data-th="Product">
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <h6 class="nomargin">
                                                                        <?php echo e($package->package_name); ?>

                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td data-th="Price">
                                                            <h4><?php echo e($package->getLab->lab_name); ?></h4>
                                                        </td>

                                                        <td data-th="Price">
                                                            ₹<?php echo e($package->price); ?>/-
                                                        </td>

                                                        <td data-th="Quantity">
                                                            <input type="number" value="1"
                                                                class="form-control quantity cart_update" min="1" />
                                                        </td>

                                                        <td data-th="Subtotal" class="text-center">
                                                            ₹<?php echo e($package->price); ?>/-
                                                        </td>

                                                        <td class="actions">
                                                            <button class="btn btn-danger btn-sm cart_remove"
                                                                value="<?php echo e($package->id); ?>">
                                                                <i class="fa fa-trash-o"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>


            <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                </td>
            </tr>
            
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-danger"> 
                            <i class="fa fa-arrow-left"></i> Continue</a>
                                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success">
                                    <i class="fa fa-money"></i>Checkout</a>
                    </td>
                </tr>
            
            </tfoot>
                
            </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Packagecart/index.blade.php ENDPATH**/ ?>
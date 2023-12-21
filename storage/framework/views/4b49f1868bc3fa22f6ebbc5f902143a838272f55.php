
<?php $__env->startSection('content'); ?>
    


    <section class="section department-single">
        <div class="container">

            <?php echo $__env->make('Front-end.Components.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
       
            <div class="row">
                <div class="col-lg-12">
                    <div class="department-img">
                        <img src="images/service/bg-1.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="department-content mt-5">
                        <h3 class="text-md"><?php echo e(ucfirst($package['package_name'])); ?></h3>
                        <div class="divider my-4"></div>
                        <p class="lead"><?php echo e($package['package_desc']); ?></p>
                        <h3 class="mt-5 mb-4">Tests</h3>
                        <div class="divider my-4"></div>

                        <div id="accordion">
                            <?php $__currentLoopData = $package['grouptest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parenttest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse"
                                            href="#desc<?php echo e($parenttest['id']); ?>">
                                            <?php echo e(ucfirst($parenttest['name'])); ?>

                                        </a>
                                    </div>
                                    <div id="desc<?php echo e($parenttest['id']); ?>" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="list-unstyled department-service">
                                                <?php $__currentLoopData = $parenttest['subtest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <i class="icofont-check mr-2"></i>
                                                        <?php echo e($subtest['sub_test_name']); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="sidebar-widget schedule-widget mt-5">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-4">Price:</h5>
                                <span>
                                    <h4>₹<?php echo e($package['price'].'/-'); ?></h4>
                                </span>
                            </li>

                            <li class="d-flex justify-content-between align-items-center">
                                <a href="#">
                                    <h5 class="mb-4">Lab Name:</h5>
                                </a>
                                <span>
                                    <h4><?php echo e(ucfirst($package['get_lab']['lab_name'])); ?></h4>
                                </span>
                            </li>
                        </ul>

                        <div class="sidebar-contatct-info mt-4">
                            <p class="mb-0">
                                <?php $items = []; ?>
                                <?php $__currentLoopData = (array) session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $items[] = $id;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $cart = session('cart', []);
                                ?>

                                <button type="button" class="btn btn-main-2 btn-round-full btn_add_to_cart"
                                    value="<?php echo e($package['id']); ?>" data-type="package">
                                    Add To Cart
                                </button>

                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('Front-end.Package.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script>
        var addToCarturl = "<?php echo e(route('add_to_package')); ?>";
        $('.btn_add_to_cart').on('click', function() {
            $(this).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

            var productId = $(this).val();
            var dataType = $(this).attr("data-type");

            var formData = {
                productId: productId,
                dataType: dataType
            };
            console.log('productId', productId)
            $.ajax({
                type: "POST",
                data: formData,
                url: addToCarturl,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added Successfully',
                            //html: errorHtml,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Reload the page
                            }
                        })
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Package/index.blade.php ENDPATH**/ ?>
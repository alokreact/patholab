<section class="banner banner-sec">
    <div class="d-flex-desk">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">

                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-target="#demo" data-slide-to="<?php echo e($key); ?>"
                                    class="<?php echo e($key === 0 ? 'active' : ''); ?>"></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($banner->url)): ?>
                                    <div class="carousel-item <?php echo e($banner->position === '1' ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url($banner->url)); ?>">
                                            <img src="<?php echo e(asset('images/bg/' . $banner->image)); ?>"
                                                class="img-responsive">
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-item ">
                                        <img src="<?php echo e(asset('images/bg/' . $banner->image)); ?>" class="img-responsive">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="banner-form">
                        <div class="region region-schedule-home-collection">
                            <form action="#" method="post" id="">

                                <h3>Schedule a Home Collection</h3>

                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="Full Name*" style="height: 60px; padding:8px">

                                    <span class="error_name"></span>

                                </div>

                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control"
                                        placeholder="Phone*" maxlength="10" style="height: 60px; padding:8px">
                                    <span class="error_phone"></span>

                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="reason" 
                                    name="option"
                                        style="height: 60px; padding:8px">
                                        <option value="">Select Reason </option>
                                        <option value="1">Nurse at Home</option>
                                        <option value="2">Medicine Home Delivery</option>
                                        <option value="3">Lab Test at Home</option>
                                        <option value="4">Physiotherapist at Home</option>
                                        <option value="5">X-Ray ECG at Home</option>
                                        <option value="6">MRI, USG , CT SCAN</option>
                                    </select>
                                    <span class="error_reason"></span>
                                </div>
                                <input class="btn btn-main-2 btn-round-full appointment-btn" type="button"
                                    value="Submit">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Components/banner.blade.php ENDPATH**/ ?>
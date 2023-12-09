
<?php $__env->startSection('content'); ?>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Address</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .booking-section {
            width: 100%;
        }

        .booking-container {
            gap: 0px;
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
            justify-content: flex-end;
        }

        .booking-details {
            padding: 30px;
            width: 100%;
        }

        .booking-date {
            padding: 20px 24px;
            font-size: 18px;
            line-height: 21px;
            background: #f5f5f5;
            color: #000;
            font-weight: 600;
        }

        .booking-box {
            border-radius: 15px;
            border: 1px solid #d9d9d9;
        }

        .appoinment-form {
            margin-top: 0px;
        }

        .booking-box_top {
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
        }

        .booking-box_top h3 {
            font-size: 18px;
        }

        .bookingCard__family {
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .booking-details input {
            height: 55px !important;
            padding: 12px !important;
        }

        .bookingCard__buttons {
            display: flex;
            justify-content: end;
            margin: 8px;
            padding: 3px;
        }
        .booking_collectionDetails {
            margin: 5px;
        }
        .collectionDetails_info {
            display: flex;
            letter-spacing: 1px;
            font-size: 16px;
        }
        .btn-address{
            display: flex;
            justify-content: end;
            margin: 3px;
        }
    </style>

    <section class="section blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="booking-section">
                            <div class="row" style="display: flex;justify-content:space-between">
                                <?php echo $__env->make('Front-end.Profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                
                                <div class="single-blog-item col-md-8">
                                    <div class="booking-container">   
                                        <div class="btn-address">
                                            <a href="<?php echo e(route('address.create')); ?>">
                                                <button class="btn btn-success">Add Address</button>
                                            </a>
                                        </div>

                                        <p class="booking-date">
                                            Address:
                                        </p>

                                    
                                        <?php if(count($addresses) > 0): ?>
                                            <?php echo $__env->make('Front-end.Profile.components.address_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('address.create')); ?>" class="mx-auto mt-4">
                                                <button class="btn btn-success">Add Address</button>
                                            </a>
                                        <?php endif; ?>

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

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Profile/tpl/address.blade.php ENDPATH**/ ?>
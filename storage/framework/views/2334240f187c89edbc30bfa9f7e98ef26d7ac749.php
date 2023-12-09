
<?php $__env->startSection('content'); ?>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">My Profile</h1>
                        <span class="text-white">Order Overview</span>
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
            gap: 20px;
            display: flex;
            margin-bottom: 20px;
            flex-direction: column;
            justify-content: flex-end;
        }

        .booking-date {
            padding: 20px 24px;
            font-size: 14px;
            line-height: 21px;
            background: #f5f5f5;
            display: flex;
            justify-content: space-between;
        }

        .booking-box {
            border-radius: 15px;
            border: 1px solid #d9d9d9;
        }

        .booking-box_top {
            display: flex;
            justify-content: flex-start;
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

        .booking_collectionDetails {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px 40px;
            border-bottom: 1px solid #f5f5f5;
        }

        .bookingCard__family__member h2 {
            font-size: 16px;
        }

        .bookingCard__family__member ul li {
            color: red;
        }

        .bookingCard__buttons {
            background: linear-gradient(223.23deg, hsla(0, 0%, 100%, .5) -39.74%, hsla(10, 71%, 92%, .5) 94.44%);
            padding: 20px 40px;
            display: flex;
            justify-content: flex-end;
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
                                    <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="booking-container">
                                            <p class="booking-date">
                                                Order Date: <?php echo e(date('d-m-Y', strtotime($items->created_at))); ?>


                                                <span> Status :  <?php if($items->order_status === '5'): ?>
                                                        Completed
                                                    <?php elseif($items->order_status === '3'): ?>
                                                        Sample Collection
                                                    <?php elseif($items->order_status === '4'): ?>
                                                        Sample Processing
                                                    <?php else: ?>
                                                        Pending
                                                    <?php endif; ?>

                                                </span>
                                            </p>
                                            <div class="booking-box">
                                                <div class="booking-box_top">
                                                    <h3>Booking ID: <span><?php echo e($items->recieptId); ?></span></h3>
                                                </div>

                                                <div class="booking_collectionDetails">
                                                    <h3>Collection date &amp; time</h3>
                                                    <div class="collectionDetails_info">
                                                        <div class="collectionDetails_info_dateTime">
                                                            <p><?php echo e(date('d-m-Y', strtotime($items->order_date))); ?><sup></sup>
                                                                | <?php echo e($items->collection_time); ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            
                                                <div class="bookingCard__buttons">
         
                                                    <?php if($items->order_status === '5'): ?>
                                                    <a href="<?php echo e(route('download.reports', [$items->id])); ?>">
                                                        <button class="border p-3 bg-green-600 font-semibold  text-basic text-white"
                                                            type="button">Download
                                                            Reports</button>
                                                    </a>
                                                    <?php else: ?>
                                                    <button class="border p-3 btn-full-round bg-red-600 font-semibold  text-basic text-white" type="button">
                                                    
                                                        Reports Pending </button>
                                                    <?php endif; ?>  
                                                </div>

                                                <div class="bookingCard__family">
                                                    <div class="bookingCard__family__member">
                                                        <ul>
                                                            <?php $__currentLoopData = $items->OrderItems()->where('order_id', $items->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = $items->subtest()->where('id', $items->product_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e($subtests->sub_test_name); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Profile/booking.blade.php ENDPATH**/ ?>
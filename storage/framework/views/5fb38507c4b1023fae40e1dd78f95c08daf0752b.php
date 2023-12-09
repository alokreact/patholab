 

<?php $__env->startSection('content'); ?>

    

    <section class="section contact-info pb-0">
        <div class="container">
            
            
            



            <div class="container mx-auto">

                <nav class="flex  mb-2 mt-0" aria-label="Breadcrumb">
                    <span class="text-gray-500 text-xs mx-2"><i class="icofont-home"></i>Home</span>
                    <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
                    <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">Packages</a>
                    
                    <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
                    <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2">  <?php echo e($category['category_name']); ?></a>
                    
                  
                </nav>
           
                <div class="flex md:flex-row flex-col">
                    <?php echo $__env->make('Front-end.Components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="w-full md:w-3/4 p-4">
                        <div class="w-full mb-4 text-xs font-semibold">
                            Showing <?php echo e(count($packages)); ?> results
                        </div>

                        <div class="flex flex-wrap mx-2">
                            <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="w-full md:w-[31%] mb-4 border mx-2">
                                    <div class="border-b-2 rounded w-full p-1 mx-auto">
                                        <a href="<?php echo e(route('package-details', [$package->id])); ?>">
                                    
                                            <img src="<?php echo e(asset('images/bg/'.$package->image)); ?>" class="" />
                                        </a>
                                    </div>

                                    <div class="p-4 mt-1 items-center flex justify-center">
                                        <h6 class="text-black text-basic font-semibold mb-2">
                                            <?php echo e(ucfirst($package->package_name)); ?>

                                        </h6>
                                    </div>
                                    <div class="p-1 mt-1 items-center flex justify-between">

                                        <h6 class="text-black text-xs font-semibold mb-2">
                                            <i class="icofont-google-map" style="font-size:16px;color:#000">
                                            </i>
                                            <?php echo e(ucfirst($package->getlab->city)); ?>

                                        </h6>
                                        <h6 class="text-black text-xs font-semibold mb-2">

                                            <?php echo e($package->getLab->lab_name); ?>

                                        </h6>
                                    </div>
                                    <div
                                        class="p-3 mt-1 mb-1 items-center bg-gray-100 flex 
                                        justify-between my-1 mx-1 rounded-full text-black">
                                        <del>₹<span><?php echo e($package->price * 2); ?>/-</span></del>
                                        <span> ₹<?php echo e($package->price); ?>/-</span>

                                        <div class="sm">50% discount </div>
                                    </div>

                                    <div class="btn-view flex justify-end m-1">
                                        <a href="<?php echo e(route('package-details', [$package->id])); ?>"
                                            class="border border-green-500 rounded-full p-2 hover:text-white hover:bg-green-400">Know
                                            More</a>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Category/packages.blade.php ENDPATH**/ ?>
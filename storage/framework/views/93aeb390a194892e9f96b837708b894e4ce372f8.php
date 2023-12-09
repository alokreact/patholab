






<section class="section doctors">
    <div class="container">
        <div class="section-title flex justify-start md:justify-start sm:justify-center">
            <h2 class="font-mediom text-2xl underline">Top Wellness Packages</h2>
        </div>

        <div class="flex justify-between items-center mb-12">
            <div class="flex">
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center space-x-1 cursor-pointer mx-2">
                        <div class="flex justify-center p-2 w-[130px] border  text-xs text-black  font-medium rounded-full hover:bg-green-500 
                            hover:text-white category-btn"
                            id="<?php echo e($category->id); ?>">
                            <?php echo e(ucfirst($category->category_name)); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>



            <div class="space-x-4 lg:mt-0 mt-2">
                <a href="<?php echo e(route('category.all')); ?>">
                    <button
                        class="border border-green-500 w-[120px]  rounded-full p-2 
                        text-black hover:scale-110 hover:bg-green-500 hover:text-white">
                        View All</button></a>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row package">

            <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex items-center p-0 mt-2 flex-col border">

                    <div class="flex w-[320px] h-[320px] bg-cover justify-center items-center p-0">
                        <a href="<?php echo e(route('package-details', $package->id)); ?>">
                            <img
                                src="<?php echo e(asset('images/bg/' . $package->image)); ?>"class='w-[300px] h-[300px] object-cover'/>
                        </a>
                    </div>

                    <div class="p-1 pb-1 flex flex-col w-full">
                        <h5 class="text-base text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                            <?php echo e($package->package_name); ?></h5>
                       
                            <h5 class="text-base text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                <?php echo e($package->getLab->lab_name); ?></h5>
                           
                       <?php
                            $count = 0;
                        ?>

                        <?php $__currentLoopData = $package->grouptest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grouptest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $value = category_count($grouptest->pivot->parent_test_id);
                                $count += $value;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="flex items-center justify-between mt-2">
                            <h5 class="parameter mt-2 text-xs">
                                <?php echo e($count); ?> Parameters
                            </h5>

                            <span
                                class="text-base font-bold text-gray-700 dark:text-white">₹<?php echo e($package->price); ?>/-</span>

                        </div>

                        <div class="flex  justify-between mt-2">
                         
                            <a href="<?php echo e(route('package-details', [$package->id])); ?>"

                                class="w-[120px] ml-2 text-black border 
                        border-bg-green  font-medium rounded-full text-base 
                        p-2 text-center hover:bg-green-500 hover:text-white">Know
                                More
                            </a>
                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Components/package.blade.php ENDPATH**/ ?>
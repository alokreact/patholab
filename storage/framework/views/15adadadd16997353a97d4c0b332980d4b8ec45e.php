
<?php $__env->startSection('content'); ?>
    <div id="loader"
        class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center z-50 hidden">
        <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-12 w-12"></div>
    </div>

    

    <section class="section contact-info pb-0">

        <div class="container mx-auto mt-2">
            <?php echo $__env->make('Front-end.Components.breadcrumb', ['breadcrumbs' => $breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="flex flex-col md:flex-row">

                <?php echo $__env->make('Front-end.Components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="w-full md:w-2/3 p-0">

                    <div class="flex justify-between p-1  my-2" id="count_result">
                        Showing <?php echo e(count($subtests)); ?> results
                        <button
                            class="border border-green-500 w-[120px]  rounded-full p-2 text-black hover:scale-110 hover:bg-green-500 hover:text-white search_multiple_test_btn">Check
                            Now</button>

                    </div>


                    <div class="flex flex-wrap mx-2" id="organResult">
                        <?php $__empty_1 = true; $__currentLoopData = $subtests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="w-full md:w-[31%] mb-4 border mx-2">
                                <div class="w-full mt-1 flex justify-end p-2">
                                    <input type="checkbox" name="test[]" class="test_id" value="<?php echo e($test->id); ?>" />
                                </div>


                                <div class="border-b-2 rounded w-[106px] p-3 mx-auto">
                                    <img src="<?php echo e(asset('Image/' . $testsbyOrgan['image'])); ?>" class=""
                                        style="max-width: 100%" />
                                </div>

                                <div class="p-4 mt-1  items-center">
                                    <h6 class="text-black text-basic text-center font-semibold mb-1">
                                        <?php echo e(ucfirst($test->sub_test_name)); ?>

                                    </h6>
                                </div>

                                <div
                                    class="p-2  mb-1 items-center  flex 
                          justify-center my-1 mx-1 text-black text-xs">
                                    <h3 class="text-xs"> BEST VALUE, FASTER REPORTS</h3>


                                </div>


                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>

                    <div id="chipResult" class="mt-1 mb-2 flex flex-row p-1 flex-wrap"></div>

                    <div class="flex flex-wrap mx-2" id="searchResult">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Organs/testbyorgan.blade.php ENDPATH**/ ?>
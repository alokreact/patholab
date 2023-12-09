
<?php $__env->startSection('content'); ?>
     
 
    <section class="section contact-info pb-0">
        <div class="container mx-auto">

            <?php echo $__env->make('Front-end.Components.breadcrumb',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

             
            <div class="flex md:flex-row flex-col">
                <?php echo $__env->make('Front-end.Components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="flex-col md:flex-row md:w-3/4 p-4 w-full">
                    <div class="w-full mb-4 text-xs font-semibold">
                        Showing <?php echo e(count($allorgans)); ?> results
                    </div>

                    <div class="w-full flex flex-wrap mx-2">
                        <?php $__empty_1 = true; $__currentLoopData = $allorgans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="w-full md:w-[31%] flex  items-center mx-2 flex-col">
                                <div class="product-bg bg-cover p-2">
                                    <a href="<?php echo e(route('testbyorgan', $organ->id)); ?>">
                                        <img src="<?php echo e(asset('Image/' . $organ->image)); ?>" alt="<?php echo e($organ->name); ?>"
                                            class="w-full md:w-56 h-56 object-cover" />
                                    </a>
                                </div>

                                <div class="p-4 mt-2 items-center flex flex-col">
                                    <h2 class="text-black text-xl font-semibold mb-2"><?php echo e($organ->name); ?></h2>
                                    <a href="<?php echo e(route('testbyorgan', $organ->id)); ?>"> 
                                        <button class="w-[120px] btn border-green-500 text-green-500 rounded-full border px-4 py-2  hover:bg-green-500 hover:text-white">
                                            View</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p> No Results Found!</p>
                        <?php endif; ?>
                    </div>



                    <div class="flex justify-end w-full mt-4 text-green-400">
                        <?php echo e($allorgans->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Organs/index.blade.php ENDPATH**/ ?>
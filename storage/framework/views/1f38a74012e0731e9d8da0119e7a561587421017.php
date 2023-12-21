
<?php $__env->startSection('content'); ?>
 

    <div class="container mt-4">


        <?php echo $__env->make('Front-end.Components.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
   
        <div class="row">        
            <?php echo $__env->make('Front-end.Components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <main class="col-md-9">
            
                    <div class="flex  justify-between mb-4 pb-3 mt-4">
                        <span class="mr-md-auto">Showing <?php echo e(count($all_categories)); ?> results</span>
                        <span class="flex justify-end md:hidden">Filter <i class="icofont-filter text-xl ml-2" id="filterButton"></i></span>
                    
                    </div>
                
                <!-- sect-heading -->

                <div class="container">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-sm-6 col-md-6" style="margin-bottom:3px">
                                <div class="contact-block mb-4 mb-lg-0">
                                    <h5><?php echo e(ucfirst($category->category_name)); ?></h5>
                                    <div class="card-body">
                                        <a href="<?php echo e(route('category.package', $category->id)); ?>"
                                            class="card-link btn btn-success">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No Results Found!</p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex justify-end w-full mt-4 text-green-400">
                        <?php echo e($all_categories->links()); ?>

                    </div>
                </div>

            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>


 

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Category/list.blade.php ENDPATH**/ ?>
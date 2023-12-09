<nav class="flex  mb-2 mt-0" aria-label="Breadcrumb">
    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($breadcrumb['url'])): ?>
        <span class="text-gray-500 text-xs mx-2"><i class="icofont-home"></i>
            <a href="<?php echo e($breadcrumb['url']); ?>" class="text-black-500 text-xs font-semibold hover:underline mx-2">
                <?php echo e($breadcrumb['label']); ?></a>
        </span>
          

        
    <?php else: ?>
        
 
        <span class="mx-2 text-xs"> <i class="icofont-rounded-right"></i> </span>
        <a href="#" class="text-black-500 text-xs font-semibold hover:underline mx-2"><?php echo e($breadcrumb['label']); ?></a>                
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



 
</nav>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Components/breadcrumb.blade.php ENDPATH**/ ?>
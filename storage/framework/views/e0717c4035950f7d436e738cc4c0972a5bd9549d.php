<!DOCTYPE html>
<html lang="en">
 <head>
   <?php echo $__env->make('Admin.layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 </head>
 <body>

<?php echo $__env->make('Admin.layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('Admin.layout.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>


<?php echo $__env->make('Admin.layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
 </body>
</html>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Admin/layout/master.blade.php ENDPATH**/ ?>
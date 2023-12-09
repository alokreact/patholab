<!DOCTYPE html>
<html lang="en">
 <head>
   <?php echo $__env->make('Front-end.layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 </head>
 <body>

  <?php echo $__env->make('Front-end.layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

  <?php echo $__env->yieldContent('content'); ?>

   
<?php echo $__env->make('Front-end.layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
 </body>
</html>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/layout/mainlayout.blade.php ENDPATH**/ ?>
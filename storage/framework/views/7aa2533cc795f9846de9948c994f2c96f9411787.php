<?php if(Session::has('message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="bi bi-star me-1"></i>
        <strong>Success !</strong> <?php echo e(session('message')); ?>

     </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   
    <i class="icofont-ui-fire-wall"></i>
        <strong>Error !</strong> <?php echo e(session('error')); ?>

</div>   
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/layout/partials/alert.blade.php ENDPATH**/ ?>
<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Partners who support us</h2>
					<div class="divider mx-auto my-4"></div>
			 	</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row clients-logo">
        <?php $__empty_1 = true; $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            
      		<div class="col-lg-6">
				<div class="client-thumb">
					<img src="<?php echo e(asset('Image/'.$lab->image)); ?>" alt="" class="img-fluid">
					<br/>
			 	</div>
			</div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No Labs</p>
         <?php endif; ?>
		
    
		</div>
	</div>
</section><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Components/logo.blade.php ENDPATH**/ ?>
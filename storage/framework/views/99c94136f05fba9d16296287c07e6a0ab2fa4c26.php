
<?php $__env->startSection('content'); ?>
    <div class="container mx-auto justify-center">
        <div class="flex p-3">
            <img src="<?php echo e(asset('images/bg/404ErrorPage.png')); ?>"/>
        </div>

		<a href="<?php echo e(route('home')); ?>" class="link_404 mt-2 flex mx-auto justify-center mb-2">
				<button class="border p-3 border-green-400 text-black text-xl font-semibold">
					Go to Home</button>
		</a>
		
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Errors/404.blade.php ENDPATH**/ ?>
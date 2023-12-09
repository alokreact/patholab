<div class="flex flex-col md:flex-row p-2">
    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="w-full md:w-1/3 border flex flex-col mt-2 mr-2">
            <div class="border-b-2 w-full p-3">
                <h3 class="text-black text-base font-semibold"><?php echo e($address->name); ?></h3>
            </div>

            <div class="w-full p-3">
                <address>
                    <h3 class="text-black text-base font-semibold"> Address: </h3>
                    <p> <?php echo e($address->address1); ?></p>
                    <span><?php echo e($address->city); ?>, <?php echo e($address->state); ?>,
                        <?php echo e($address->zip); ?>

                </address>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Phone: <?php echo e($address->phone); ?></h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Email: <?php echo e($address->email); ?></h3>
            </div>

            <div class="w-full flex justify-between p-2">

                <a href="<?php echo e(route('address.edit', $address->id)); ?>">
                    <button
                        class="border p-2 text-black border-green-400 hover:bg-green-400  hover:text-white mr-2"
                        type="button"><i class="icofont-edit"></i></button>
                </a>

                <button class="p-2 border remove_address_btn" type="button"
                    value="<?php echo e($address->id); ?>"><i class="icofont-ui-delete"></i></button>
            </div>
        </div>


          
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Profile/components/address_card.blade.php ENDPATH**/ ?>
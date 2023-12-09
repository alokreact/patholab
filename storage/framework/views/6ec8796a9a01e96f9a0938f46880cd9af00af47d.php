<div class="flex flex-col md:flex-row p-2">
    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="w-full md:w-1/3 border flex flex-col mt-2 mr-2">
            <div class="border-b-2 w-full p-3">
                <h3 class="text-black text-base font-semibold">Name: <span><?php echo e($patient->name); ?></span>
                </h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Age - <?php echo e($patient->age); ?></h3>
            </div>

            <div class="w-full p-2">
                <h3 class="text-black text-base font-semibold">Gender - <?php echo e($patient->gender === 1 ? 'Male' : 'Female'); ?>

                </h3>
            </div>

            <div class="w-full flex justify-between p-2">
                <a href="<?php echo e(route('patient.edit', [$patient->id])); ?>">
                    <button class="p-2 border text-black border-green-400 hover:bg-green-400  hover:text-white mr-2"
                        type="button"><i class="icofont-edit"></i></button>
                </a>
                <button class="p-2 border delete_patient" type="button" value="<?php echo e($patient->id); ?>"><i
                        class="icofont-ui-delete"></i></button>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Profile/components/patient_card.blade.php ENDPATH**/ ?>
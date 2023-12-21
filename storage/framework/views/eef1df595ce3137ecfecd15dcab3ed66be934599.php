<?php if(session()->has('coupon_sesssion')): ?>
    <?php
        $sessionArray = session('coupon_sesssion', []);
        //dd($sessionArray)
    ?>

    <?php $__currentLoopData = $sessionArray['cartItems']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="max-width: 240px">
                <h5 class="font-size-16 text-truncate">
                    <a href="#" class="text-dark">
                        <?php $__currentLoopData = $product_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($name); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </a>
                </h5>
                <p class="text-muted mb-0"><b>Lab -</b> <?php echo e(ucfirst($value->name)); ?></p>
                <p class="text-muted mb-0 mt-1"></p>
            </td>

            <td>₹<?php echo e($sessionArray['price']); ?>/-</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td colspan="1">
            <h5 class="font-size-14 m-0">Sub Total :</h5>
        </td>
        <td>₹<?php echo e($sessionArray['price']); ?>/-</td>
    </tr>
    <tr>
        <td colspan="1">
            <h5 class="font-size-14 m-0">Coupon:</h5>
        </td>
        <td>FREE10</td>
    </tr>

    <tr class="bg-light">
        <td colspan="1">
            <h5 class="font-size-14 m-0">Total:</h5>
        </td>
        <td id="total">₹<?php echo e($sessionArray['total']); ?>/-</td>
    </tr>

    <tr class="bg-light">
        <td colspan="2">
            <div class="mt-2  relative">
                <div class="flex  p-1 w-[100%] mt-2  coupon_applied">
                    <span class="text-black p-2">Coupn <b>FREE10</b> Applied</span>
                </div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tbody>
        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="max-width: 240px">
                    <h5 class="font-size-16 text-truncate">
                        <a href="#" class="text-dark">
                            <?php $__currentLoopData = $product_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($name); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </a>
                    </h5>
                    <p class="text-muted mb-0"><b>Lab -</b> <?php echo e(ucfirst($details->name)); ?></p>
                    <p class="text-muted mb-0 mt-1"></p>
                </td>
                <td>₹<?php echo e($details->price); ?>/-</td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="1">
                <h5 class="font-size-14 m-0">Sub Total :</h5>
            </td>
            <td>₹<?php echo e($details->price); ?>/-</td>
        </tr>

        <tr>
            <td colspan="1">
                <h5 class="font-size-14 m-0">Coupon:</h5>
            </td>
            <td>FREE10</td>
        </tr>

        <tr class="bg-light">
            <td colspan="1">
                <h5 class="font-size-14 m-0">Total:</h5>
            </td>
            <td id="total">₹<?php echo e($details->price); ?>/-</td>
        </tr>
        <tr class="bg-light">
            <td colspan="2">
                <div class="mt-2  relative">
                    <div class="flex justify-between p-2 applied_coupon_box">
                        <input type="text" name="apply_coupon" class="form-control w-[57%]" id="apply_coupon"
                            value="FREE10" disabled />
                        <span class="coupon_error" style="color: red"></span>
                        <button type="button"
                            class="border bg-yellow-400 text-basic text-white 
                            font-semibold mt-1 p-1 w-[35%] focus:outline-none active:outline-none"
                            id="apply-coupon-btn">
                            APPLY <span class="spinner hidden"><i class="icofont-spinner-alt-1"></i></span>
                        </button>
                    </div>

                    <div class="flex  p-1 w-[100%] mt-2 hidden coupon_applied">
                        <span class="text-black p-2">Coupn <b>FREE10</b> Applied</span>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Checkout/template/cart/testCart.blade.php ENDPATH**/ ?>
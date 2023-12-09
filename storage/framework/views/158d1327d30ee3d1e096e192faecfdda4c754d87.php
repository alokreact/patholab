
<?php $__env->startSection('content'); ?>
    <style>
        .form-group.otp-fields input {
            width: 42px;
            height: 42px;
            margin: 0 10px 0 0;
            border-radius: 8px;
            background-color: rgb(91 108 126 / 9%);
            border: 0;
            text-align: center;
        }

        .appoinment-wrap span {
            font-size: 10px;
            margin-top: 5px;
        }

        .resend-otp {
            font-size: 14px;
        }
        .resend-otp span {
            font-size: 14px;
        }
    </style>

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-5 text-lg">Login</h1>

                        <span class="text-white">Get access to your orders, lab tests & consultations</span>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="conatiner">
        <div class="flex flex-col lg:w-[35%] md:w-full p-4 shadow-lg mx-auto mt-4 mb-4" id="send-otp">
            <div class="mt-2 border p-4">
                <h4 class="text-xl text-green font-semibold text-center">LOGIN</h4>
            </div>

            <div class="lg:w-full md:w-full p-4">
                <form>
                    <div class="flex mb-4">
                        <div class="w-full mr-4 p-4">
                            <label for="name">Phone No:</label>
                            <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Phone"
                                autocomplete="off" maxlength="10">
                            <?php if($errors->has('mobile')): ?>
                                <strong style="color:red"><?php echo e($errors->first('mobile')); ?></strong>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex mt-4 justify-center">
                        <div
                            class="w-[70%] mr-4 flex items-center 
                            hover:text-white justify-center border hover:bg-green-400 cursor-pointer font-semibold text-base">
                            <button
                                class=" p-3   
                            text-base text-black  
                             otp-btn">
                                LOGIN

                            </button>
                            <img src="<?php echo e(asset('images/about/ArrowRight.png')); ?>"class="ml-2" />
                        </div>
                    </div>

                    <p class="mt-8 text-base font-semibold">
                        New on CALL LABS?
                        <a href="<?php echo e(route('signup')); ?>" style="color:coral;font-weight:700"> SIGN UP</a>

                    </p>

                </form>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Front-end.Auth.verifyotp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Auth/signin.blade.php ENDPATH**/ ?>
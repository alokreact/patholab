<body id="top">
    <div class="flex items-center justify-between p-2  text-white" style="background-color: #28a745">
        <div class="flex flex-col p-2 w-full relative">
            <div class="flex-grow mx-4  items-center flex justify-center ">
                    <input type="text" placeholder="Search for Tests (CBC, MRI, etc...)"
                        class="w-full  md:w-[50%]  p-4 text-center border border-green-400 shadow-md 
                    bg-white rounded-full  text-black focus:outline-none"
                        id="search-input" autocomplete="off" />

                    
            </div>

            <div id="search"
                class="list-group mt-2 w-[70%] md:w-[40%]  flex-col p-2  mx-auto Z-1 absolute top-1/2 left-[30%] h-[230px]"
                style="z-index: 1">
            </div>
        </div>


        <div class="hidden md:flex items-center space-x-6">
            <div class="relative flex justify-between p-2">
                <?php if(auth()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
               
                        <button class="px-4 py-2 rounded-md focus:outline-none dropdown-btn">
                            <i class="icofont-user-male text-2xl text-white"></i>
                        </button>
            
            <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">
                <a href="<?php echo e(route('address')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Address</a>
                <a href="<?php echo e(route('profile')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Booking</a>
                <a href="<?php echo e(route('patient')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">Members</a>
                <a href="<?php echo e(route('coupon')); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-300">My Referral</a>
                
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="p-2 focus:outline-none" type="submit">
                        <i class="icofont-sign-out text-2xl text-white"></i>Logout
                    </button>
                </form>
            </div>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('signin')); ?>">
                        <i class="icofont-user-male text-2xl text-white"></i>
                    </a>
                <?php endif; ?>
            </div>


            

            <div class="text-xl flex justify-space p-2">
                <a href="<?php echo e(route('cart')); ?>" class="call-us-desk mr-2">
                    <i class="icofont-cart text-2xl text-white"></i>
                </a>
            </div>
        </div>

        <?php
            //print_r((array)session('cart'));
            $cartCount = 0;
            foreach ((array) session('cart') as $key => $value) {
                $cartCount = count($value);
            }
        ?>

        <span class="badge badge-pill badge-danger"><?php echo e($cartCount); ?></span>


    </div>


    <div class="bg-gray-100 shadow-md flex text-white justify-end w-full">

        <div class="md:hidden flex w-full">


            <?php echo $__env->make('Front-end.layout.partials.mobile-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        <div
            class="hidden md:flex justify-between items-center space-x-4 text-base 
        font-semibold text-black w-full">

            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/Logo-removebg.png')); ?>" alt="" class=""
                    style="height:85px; width:215px">
            </a>

            <ul class="flex text-basic text-black">
                <li><a class="mr-4" href="<?php echo e(route('about')); ?>">About</a>
                </li>
                <li> <a class="mr-4" href="<?php echo e(route('category.all')); ?>">Packages</a>
                </li>
                <li> <a class="mr-4" href="<?php echo e(route('contact')); ?>">Contact</a>
                </li>
                <li> <a class="mr-4" href="<?php echo e(route('prescription')); ?>" style="color:#00a651">Upload
                        Prescription</a></li>
            </ul>

        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/layout/partials/header.blade.php ENDPATH**/ ?>
<style>
    @primary: #4a4a4a;
    @secondary: #ffffff;
    @tertiary: #000000;
    @arrow-size: 12px;
    @arrow-distance: 20px;
    @vertical-space: 10px;

    .product-carousel-header {
        background: #fff;
        color: #ffffff;
        box-sizing: border-box;
        padding: 10px 14px;
        width: 100%;
    }
    .product-carousel {
        box-sizing: border-box;
        padding: 20px 40px;
        width: 100%;
    }

    .product-carousel .product {
        box-sizing: border-box;
        margin:
		text-align: center;
        display: flex;
        flex-flow: column;
        align-content: space-between;
    }

    .product-carousel .product-top {
        width: 100%;
    }
	.product-top img{
		width: 45%;
	}

    .product-carousel p,
     {
        margin: 0 0 10px 0;
	 } 
     

    /** ARROWS **/
    i {
     
        cursor: pointer;
    }

    .right {
        right: @arrow-distance;
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
    }

    .left {
        left: @arrow-distance;
        transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
    }

    /** SLICK SLIDER CSS **/
    /* Slider */
    .slick-slider {
        position: relative;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        display: flex;
        position: relative;
        top: 0;
        left: 0;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    [dir='rtl'] .slick-slide {
        float: right;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }
</style>

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

        <div class="product-carousel">

            <?php $__empty_1 = true; $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="product">
                    <div class="product-top">
                        <img src="<?php echo e(asset('Image/' . $lab->image)); ?>" alt="" class="img-fluid">
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>No Labs</p>
            <?php endif; ?>




        </div>
    </div>






</section>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Components/logo.blade.php ENDPATH**/ ?>
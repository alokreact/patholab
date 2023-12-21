<style>
    .PriceDetails_wrapper {
        /* border-bottom: 1px solid #d9d9d9; */
        border-radius: 15px;
        margin-top: 20px;
        flex-direction: column;
        gap: 10px;
        padding-top: 20px
    }
    .PriceDetails_details {
        display: flex;
        padding: 25px;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #2f3032;
        font-style: italic;
    }
</style>

<div class="col-xl-4">
    <div class="card checkout-order-summary">
        <div class="card-body">
            <div class="p-3 bg-light mb-3">
                <h5 class="font-size-16 mb-0">Bill Summary<span class="float-end ms-2"></span></h5>
            </div>

            <div class="table-responsive">
                <table class="table table-centered mb-0 table-nowrap">
            
                    <thead>
                        <tr>
                            <th class="border-top-0" style="width: 330px;" scope="col">
                                <?php echo e($type[0] === 'test'?'Test':'Package'); ?></th>
                            <th class="border-top-0" scope="col">Price</th>
                        </tr>
                    </thead>

                    <?php if($type[0] === 'test'): ?>
                      <?php echo $__env->make('Front-end.Checkout.template.cart.testCart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                      <?php echo $__env->make('Front-end.Checkout.template.cart.packageCart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
            
                </table>
            </div>


            <?php echo $__env->make('Front-end.Checkout.template.cart.referralSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Checkout/template/cartlist.blade.php ENDPATH**/ ?>
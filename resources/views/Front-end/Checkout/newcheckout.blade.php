<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
    integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    body {
        margin-top: 20px;
        background-color: #f1f3f7;
    }

    .card {
        margin-bottom: 24px;
        -webkit-box-shadow: 0 2px 3px #e4e8f0;
        box-shadow: 0 2px 3px #e4e8f0;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        /* border: 1px solid #eff0f2; */
        border-radius: 1rem;
    }

    .activity-checkout {
        list-style: none
    }

    .activity-checkout .checkout-icon {
        position: absolute;
        top: -4px;
        left: -24px
    }

    .activity-checkout .checkout-item {
        position: relative;
        padding-bottom: 24px;
        padding-left: 35px;
        border-left: 2px solid #f5f6f8
    }

    .activity-checkout .checkout-item {
        border-color: #01D5A3
    }

    .activity-checkout .checkout-item:first-child:after {
        background-color: #01D5A3
    }

    .activity-checkout .checkout-item:last-child {
        /* border-color: transparent */
    }

    .activity-checkout .checkout-item.crypto-activity {
        margin-left: 50px
    }

    .activity-checkout .checkout-item .crypto-date {
        position: absolute;
        top: 3px;
        left: -65px
    }



    .avatar-xs {
        height: 1rem;
        width: 1rem
    }

    .avatar-sm {
        height: 2rem;
        width: 2rem
    }

    .avatar {
        height: 3rem;
        width: 3rem
    }

    .avatar-md {
        height: 4rem;
        width: 4rem
    }

    .avatar-lg {
        height: 5rem;
        width: 5rem
    }

    .avatar-xl {
        height: 6rem;
        width: 6rem
    }

    .avatar-title {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: #3b76e1;
        color: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-weight: 500;
        height: 100%;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 100%
    }

    .avatar-group {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding-left: 8px
    }

    .avatar-group .avatar-group-item {
        margin-left: -8px;
        border: 2px solid #fff;
        border-radius: 50%;
        -webkit-transition: all .2s;
        transition: all .2s
    }

    .avatar-group .avatar-group-item:hover {
        position: relative;
        /* -webkit-transform: translateY(-2px);
    transform: translateY(-2px) */
    }

    .card-radio {
        background-color: #fff;
        border: 2px solid #eff0f2;
        border-radius: .75rem;
        padding: .5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block
    }

    .card-radio:hover {
        cursor: pointer
    }

    .card-radio-label {
        display: block
    }

    .edit-btn {
        width: 35px;
        height: 35px;
        line-height: 40px;
        text-align: center;
        position: absolute;
        right: 25px;
        margin-top: -50px
    }

    .card-radio-input {
        display: none
    }

    .card-radio-input:checked+.card-radio {
        border-color: #3b76e1 !important
    }
    .font-size-16 {
        font-size: 16px !important;
    }
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    a {
        text-decoration: none !important;
    }
    .form-control {
        display: block;
        width: 100%;
        padding: 0.47rem 0.75rem;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #545965;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e2e5e8;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.75rem;
        -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    }

    .edit-btn {
        width: 35px;
        height: 35px;
        line-height: 40px;
        text-align: center;
        position: absolute;
        right: 25px;
        margin-top: -50px;
    }

    .ribbon {
        position: absolute;
        right: -26px;
        top: 20px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        padding: 1px 22px;
        font-size: 13px;
        font-weight: 500
    }
    .Stepper_cont{

        position: fixed;
    top: 162px;
    width: 44%;
    background: #fff;
    padding: 35px 0;
    }
    .Stepper_stepsCont{
        display: flex;
        justify-content: space-between;
        text-align: center;
    }
    .Stepper_stepCont{
        align-items:flex-start;
        display: flex;
        flex-direction: column;
        gap: 6px;
        z-index: 1;
    }
    .Stepper_step{

        width: 48px;
        height: 48px;
        display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    }
    .Stepper_number{
        font-size:17px;
        color: #fff;

    }
    .Stepper_line{
    width: calc(100% - 72px);
    height: 2px;
    background: linear-gradient(90deg,#31ccb0 50%,#9d9fa1 0);
    background-size: 200%;
    background-position: 100% 0;
    transition: all .25s linear;
    position: absolute;
    top: 44px;
    left: 36px;
    }
</style>

@extends('Front-end.layout.mainlayout')
@section('content')

<div class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    
                    <div class="card-body">

                        
                        <div class="Stepper_cont mt-4 mb-4" id="cart-stepper">
                            <div class="Stepper_stepsCont">
                                <div class="Stepper_stepCont">
                                    <div class="Stepper_step" style="background: #01D5A3; cursor: default; transition: all 0ms linear 250ms;">
                                        <span class="Stepper_number">1</span>
                                    </div>    
                                    <span>Confirm<br>Tests</span>
                                </div>
                                <div class="Stepper_stepCont">
                                    <div class="Stepper_step" style="background: #01D5A3; cursor: not-allowed;">
                                        <span class="Stepper_number">2</span>
                                    </div>
                                        <span>Add<br>Patients</span>
                                </div>
                                <div class="Stepper_stepCont">
                                    <div class="Stepper_step" style="background: rgb(157, 159, 161); cursor: not-allowed;">
                                        <span class="Stepper_number">3</span>
                                    </div><span>Address<br>&amp;&nbsp;Time</span>
                                </div>
                                <div class="Stepper_stepCont">
                                    <div class="Stepper_step" style="background: rgb(157, 159, 161); cursor: not-allowed;">
                                        <span class="Stepper_number">4</span>
                                    </div>
                                    <span>Payment</span>
                                </div>
                            </div>
                                <hr class="Stepper_line" style="background-position: 100% 0px;">
                        </div>
             

                      
                        <ol class="activity-checkout mb-0 px-4" style="margin-top: 120px">
                            @include('Front-end.Checkout.template.address')
                      
                            @include('Front-end.Checkout.template.patient')
                       
                            <li class="checkout-item">
                                    @include('Front-end.Checkout.template.slot')
                                </div>
                            </li>
                        
                        </ol>


                    </div>
                </div>

                <div class="row my-4">



                    <div class="col">
                        <a href="#" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->

                    <div class="col" style="display: flex;place-content: end">
                        <div class="text-end mt-2 mt-sm-0">
                            <input type="submit" class="btn btn-success" value="Proceed">
                                {{-- <i class="mdi mdi-cart-outline me-1"></i>--}}
                                
                        </div>
                    
                    </div> <!-- end col -->
                </div> <!-- end row-->
            
            </div>
            @include('Front-end.Checkout.template.cartlist')
        </form>
               
        </div>
        <!-- end row -->
    </div>
</div>    
@endsection

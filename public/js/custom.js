
 $(document).on('click','.btn_add_to_cart_test',function () {

    var button = $(this);
    $(button).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

    var productId = $(this).val();
    var dataType = $(this).attr("data-type");
    var labId = $(this).attr("data-lab");
    var price = $(this).attr("data-price");
    var singleprice = $(this).attr("data-singleprice");

    var formData = {
        productId: productId,
        dataType: dataType,
        labId: labId,
        price: price,
        singleprice: singleprice
    };
    //console.log('productId', productId)
    $.ajax({
        type: 'POST',
        data: formData,
        //url: APP_URL+'/add-to-cart',
        url:APP_URL+'/test/add-to-cart',

        success: function (response, textStatus, xhr) {
           // console.log('productId', response.cart)
            if (xhr.status === 200) {
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    icon:'success',
                    showConfirmbutton:false,
                    timer:3000
                })
                Toast.fire({
                    type:'success',
                    title: 'Test Added Successfully',
                    //html: errorHtml,
                }).then((result) => {
                    if (result.isConfirmed) {
                        //window.location.reload(); // Reload the page
                        $(button).html('Add to Cart');
                        $('.badge-danger').html(response.cart);
                        $('html, body').animate({
                            scrollTop: $('header').offset().top
                        }, 1000);
                    }
                });
            } else {
                alert(response.data)
                //window.location.reload();
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
});

$('.prescription-btn').on('click',function(e){
        e.preventDefault();
        console.log('working');
        var valid = true;
        var name = $('#name').val();
        var phone = $('#phone').val();
        var allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png)$/i;
        var fileName = $('#fileInput').val();
        
        if(name === ''){
            $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required!');
            valid = false;
        }
         
        else if(!allowedExtensions.exec(fileName)){
            $('.error_report').html('<i class=\"icofont-info-circle\"></i> &nbsp;Report is not selected!');
            valid = false;
        }
        else if(phone ===''){
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
            valid = false;

        }
        else{
            console.log('>>>',valid)
            valid = true;
        }

        if(valid){
            // var formData = $('.prescrption-form').serialize();
            // console.log('form',formData)

            // $.ajax({
            //         url:APP_URL+'/prescription/submit',
            //         method:'post',
            //         data:formData,
            //         success:function(res,textStatus, xhr){
            //             if (xhr.status === 200) {
            //                 const Toast = Swal.mixin({
            //                     toast:true,
            //                     position:'top-end',
            //                     icon:'success',
            //                     showConfirmbutton:false,
            //                     timer:3000
            //                 })
            //                 Toast.fire({
            //                     type:'success',
            //                     title: 'Report Uploaded Successfully',
            //                     //html: errorHtml,
            //                 })
            //             }

            //         }
            // });
            $('.prescrption-form').submit();
        }
});


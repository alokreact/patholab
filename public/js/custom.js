$(document).on('click', '.btn_add_to_cart_test', function () {

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
        url: APP_URL + '/test/add-to-cart',

        success: function (response, textStatus, xhr) {
            // console.log('productId', response.cart)
            if (xhr.status === 200) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmbutton: false,
                    timer: 3000
                })
                Toast.fire({
                    type: 'success',
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

$('.prescription-btn').on('click', function (e) {
    e.preventDefault();
    console.log('working');


    var valid = true;
    var name = $('#name').val();
    var phone = $('#phone').val();
    var allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png)$/i;
    var fileName = $('#report').val();

    if (name === '') {
        $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required!');
        valid = false;
    }
    else {

        $('.error_name').html('');
    }

    if (!allowedExtensions.exec(fileName)) {
        $('.error_report').html('<i class=\"icofont-info-circle\"></i> &nbsp;Report is not selected!');
        valid = false;
    }
    else {

        $('.error_report').html('');
    }

    if (phone === '') {
        $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
        valid = false;
    }

    if (phone) {
        if (!$.isNumeric(phone)) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be numeric.');
            valid = false;
        }
        else if (phone.trim().length > 10 || phone.trim().length < 10) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be at least 10 digits.');
            valid = false;
        }
        else {
            $('.error_phone').html('');

        }
    }

    if (name !== '' && phone !== '') {
        valid = true;
    }

    if (valid) {

        var name = $('#name').val();
        var phone = $('#phone').val();

        var report = $('#report')[0].files[0];

        var reportData = new FormData();
        reportData.append('phone', phone);
        reportData.append('report', report);
        reportData.append('name', name);

        //
        //console.log(reportData)

        $.ajax({
            url: APP_URL + '/prescription/submit',
            method: 'POST',
            data: reportData,
            processData: false,
            contentType: false,
            success: function (res, textStatus, xhr) {
                if (xhr.status === 200) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmbutton: false,
                        timer: 3000
                    })
                    Toast.fire({
                        type: 'success',
                        title: 'Report Uploaded Successfully',
                        //html: errorHtml,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Reload the page
                        }
                    });
                }

            }
        });
        //$('.prescrption-form').submit();
    }
});


$('.address-btn').on('click', function (e) {
    e.preventDefault();
    console.log('working');
    var valid = true;
    var name = $('#name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var address1 = $('#address1').val();
    var state = $('#state').val();
    var city = $('#city').val();
    var zip = $('#zip').val();

    console.log('>>addr', address1)

    if (name === '') {
        $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required!');
        valid = false;
    }
    else {
        $('.error_name').html('');
    }
    if (email === '') {
        $('.error_email').html('<i class=\"icofont-info-circle\"></i> &nbsp;Email is required.');
        valid = false;
    }
    if (email) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            $('.error_email').html('');
        }
        else {
            $('.error_email').html('<i class=\"icofont-info-circle\"></i> &nbsp;Valid Email is required.');
            valid = false;

        }
    }
    if (phone === '') {
        $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
        valid = false;
    }

    if (phone) {
        if (!$.isNumeric(phone)) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be numeric.');
            valid = false;
        }
        else if (phone.trim().length > 10 || phone.trim().length < 10) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be at least 10 digits.');
            valid = false;
        }
        else {
            $('.error_phone').html('');

        }
    }

    // if(zip.trim().length >6){
    // 	errors.push('Zip No should be numeric and must be 6 digits.');
    // }

    // if($.isNumeric(phone.trim()) && phone.trim().length > 10){
    // 	errors.push('Phone No should be numeric and must be 10 digits.');
    // }
    // if (address.trim() === '') {
    // 	errors.push('Address is required.');
    // }


    if (address1.trim().length === 0) {
        $('.error_address1').html('<i class=\"icofont-info-circle\"></i> &nbsp;Address is required.');
        valid = false;
    }
    else {
        $('.error_address1').html('');

    }

    if (city.trim().length === 0) {
        $('.error_city').html('<i class=\"icofont-info-circle\"></i> &nbsp;City is required.');
        valid = false;
    }
    else {
        $('.error_city').html('');

    }
    if (state === '') {
        $('.error_state').html('<i class=\"icofont-info-circle\"></i> &nbsp;State is required.');
        valid = false;

    }

    else {
        $('.error_state').html('');

    }
    if (zip === '') {
        $('.error_zip').html('<i class=\"icofont-info-circle\"></i> &nbsp;Zip is required.');
        valid = false;
    }

    if (zip) {
        if (!$.isNumeric(zip)) {
            $('.error_zip').html('<i class=\"icofont-info-circle\"></i> &nbsp;Zip code should be numeric and must be 6 digits.');
            valid = false;
        }
        else if (zip.trim().length > 6) {
            $('.error_zip').html('<i class=\"icofont-info-circle\"></i> &nbsp;Zip code should be 6 digits.');
            valid = false;
        }
        else {
            $('.error_zip').html('');
        }
    }

    if (zip !== '' && state !== '' && city !== '' && phone !== '' && email !== '' && name !== '' &&
        zip.trim().length === 6) {

        console.log('>>>', valid)
        valid = true;
    }


    if (valid) {

        var formData = $('.address-form').serialize();
        console.log('form', formData)

        $.ajax({
            url: APP_URL + '/address/submit',
            method: 'post',
            data: formData,
            success: function (res, textStatus, xhr) {

                console.log('res', res)
                if (xhr.status === 201) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmbutton: false,
                        timer: 3000
                    })
                    Toast.fire({
                        type: 'success',
                        title: res.message,
                        //html: errorHtml,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Reload the page
                        }
                    });
                }
            }
        });
        //$('.prescrption-form').submit();
    }
});


$("#add_patient").on('click', function (event) {

    event.preventDefault(); // Prevent form submission
    $(this).html('<i class="icofont-spinner-alt-6" style="padding:2px"></i>');

    var name = $("#patient_name").val();
    var age = $("#age").val();
    var gender = $("#gender").val();

    var errors = [];
    if (name.trim() === '') {
        errors.push('Name is required.');
    }
    if (age.trim() === '') {
        errors.push('Age is required.');

    }
    if (gender.trim() === '') {
        errors.push('Gender is required.');
    }

    if (errors.length > 0) {
        var errorHtml = '<ul>';
        errors.forEach(function (error) {
            errorHtml += '<li>' + error + '</li>';
        });
        errorHtml += '</ul>';

        Swal.fire({
            icon: 'error',
            //title: 'Validation Errors',
            html: errorHtml,
        });
        $(this).html('Save');
    }
    else {
        $.ajax({
            type: "POST",
            url: APP_URL + '/save/patient', // Your backend processing script
            data: {
                name: name,
                age: age,
                gender: gender
            },
            success: function (response, textStatus, xhr) {
                if (xhr.status === 201) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmbutton: false,
                        timer: 3000
                    })
                    Toast.fire({
                        type: 'success',
                        title: response.message,
                        //html: errorHtml,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Reload the page
                        }
                    });
                }
            }
        });
    }

});


$('.number_only').on('input', function () {
    if (this.value.length > 1) {
        this.value = this.value.slice(0, 1); // Allow only single digit
    }

    // Move focus to the next input field
    var index = $('.single-digit-input').index(this);
    if (index < $('.single-digit-input').length - 1) {
        $('.single-digit-input').eq(index + 1).focus();
    }
});

$('.remove_address_btn').on('click', function (e) {

    e.preventDefault();

    var id = $(this).val();

    Swal.fire({
        title: 'Success!',
        text: 'Do you really want to remove?',
        icon: 'success',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({

                url: APP_URL + '/delete/address/' + id,
                method: 'DELETE',
                success: function (response, textStatus, xhr) {
                    console.log(response)
                    if (xhr.status === 200) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmbutton: false,
                            timer: 3000
                        })
                        Toast.fire({
                            type: 'success',
                            title: response.message,
                            //html: errorHtml,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Reload the page
                            }
                        });
                    }
                }
            })
        }
    })
})


$('.appointment-btn').on('click', function () {
    var reason = $('#reason').val();
    var name = $('#name').val();
    var phone = $('#phone').val();
    var valid = true;

    if (reason === '') {
        $('.error_reason').html('<i class=\"icofont-info-circle\"></i> &nbsp;Select an option.');
        valid = false;
    }
    if (name === '') {
        $('.error_name').html('<i class=\"icofont-info-circle\"></i> &nbsp;Name is required.');
        valid = false;
    }
    else {
        $('.error_name').html('');
    }

    if (phone === '') {
        $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone is required.');
        valid = false;
    }
    if (phone) {
        if (!$.isNumeric(phone)) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be numeric.');
            valid = false;
        }

        else if (phone.trim().length > 10 || phone.trim().length < 10) {
            $('.error_phone').html('<i class=\"icofont-info-circle\"></i> &nbsp;Phone should be at least 10 digits.');
            valid = false;
        }
        else {
            $('.error_phone').html('');
        }
    }

    if (name !== '' && phone !== '' && reason !== '') {
        valid = true;
    }

    if (valid) {
        $.ajax({
            url: APP_URL + '/appointment/submit',
            method: "post",
            data: { name, reason, phone },
            success: function (res, textStatus, xhr) {
                if (xhr.status === 201) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        icon: 'success',
                        showConfirmbutton: false,
                        timer: 3000
                    })
                    Toast.fire({
                        type: 'success',
                        title: res.message,
                        //html: errorHtml,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Reload the page
                        }
                    });
                }
            }
        })
    }
})

$('.sidebar_toggle').on('click',function(){
    console.log('err');
    $('#mobile-menu').hide();
})

$(document).on('click', '.menu_toggle',function(){
    $('#mobile-menu').show();
})

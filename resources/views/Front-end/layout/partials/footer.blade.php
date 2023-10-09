 <footer class="footer section gray-bg">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 mr-auto col-sm-6">
                 <div class="widget mb-5 mb-lg-0">
                     <div class="logo mb-4">
                         <img src="{{ asset('images/Logo-removebg.png') }}" alt="" class=""
                             style="height:80px; width:220px">
                     </div>
                     <p>All products displayed on CALL LABS are procured from verified and licensed pharmacies. All labs
                         listed on the platform are accredited.</p>

                     <ul class="list-inline footer-socials mt-4">
                         <li class="list-inline-item"><a href="https://www.facebook.com/calllabs"><i
                                     class="icofont-facebook"></i></a></li>
                         <li class="list-inline-item"><a href="https://twitter.com/calllabs"><i
                                     class="icofont-twitter"></i></a></li>
                         <li class="list-inline-item"><a href="https://www.linkedin.com/calllabs/"><i
                                     class="icofont-linkedin"></i></a></li>
                         <li class="list-inline-item"><a href="https://www.youtube.com/calllabs/"><i
                                     class="icofont-youtube"></i></a></li>

                     </ul>
                 </div>
             </div>

             <div class="col-lg-2 col-md-6 col-sm-6">
                 <div class="widget mb-5 mb-lg-0">
                     <h4 class="text-capitalize mb-3">Department</h4>
                     <div class="divider mb-4"></div>

                     <ul class="list-unstyled footer-menu lh-35">

                         <li><a href="#">Wome's Health</a></li>
                         <li><a href="#">Wellness Package</a></li>
                         <li><a href="#">Heaert Health</a></li>
                         <li><a href="#">Medicine</a></li>
                     </ul>
                 </div>
             </div>

             <div class="col-lg-2 col-md-6 col-sm-6">
                 <div class="widget mb-5 mb-lg-0">
                     <h4 class="text-capitalize mb-3">Support</h4>
                     <div class="divider mb-4"></div>

                     <ul class="list-unstyled footer-menu lh-35">
                         <li><a href="#">Terms & Conditions</a></li>
                         <li><a href="#">Privacy Policy</a></li>
                         <li><a href="#">FAQuestions</a></li>
                     </ul>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 col-sm-6">
                 <div class="widget widget-contact mb-5 mb-lg-0">
                     <h4 class="text-capitalize mb-3">Get in Touch</h4>
                     <div class="divider mb-4"></div>

                     <div class="footer-contact-block mb-4">
                         <div class="icon d-flex align-items-center">
                             <i class="icofont-email mr-3"></i>
                             <span class="h6 mb-0">Support Available for 24/7</span>
                         </div>
                         <h4 class="mt-2"><a href="tel:+23-345-67890">support@callabs.in</a></h4>
                     </div>

                     <div class="footer-contact-block">
                         <div class="icon d-flex align-items-center">
                             <i class="icofont-support mr-3"></i>
                             <span class="h6 mb-0">Mon to Fri : 08:30am - 21:00pm</span>
                         </div>
                         <h4 class="mt-2"><a href="tel:+91-7893762020">+7893762020</a></h4>
                     </div>
                 </div>
             </div>
         </div>

         <div class="footer-btm py-4 mt-5">
             <div class="row align-items-center justify-content-between">
                 <div class="col-lg-6">
                     <div class="copyright">
                         &copy; Copyright Reserved to <span class="text-color">CALL LABS</span></a>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                         <form action="#" class="subscribe">
                             <input type="text" class="form-control" placeholder="Your Email address">
                             <a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
                         </form>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-lg-4">
                     <a class="backtop js-scroll-trigger" href="#top">
                         <i class="icofont-long-arrow-up"></i>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </footer>



 <!--
    Essential Scripts
    =====================================-->

 <!-- Main jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

 {{-- <script src="{{asset('plugins/jquery/jquery.js')}}"></script> --}}

 <!-- Bootstrap 4.3.2 -->
 <script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

 <!-- Slick Slider -->
 <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
 <!-- Counterup -->
 <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>

 <script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>
 <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>
 <!-- Google Map -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <script src="{{ asset('js/script.js') }}"></script>
 <script src="{{ asset('js/contact.js') }}"></script>
 <script src="{{ asset('js/custom.js') }}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @stack('after-scripts')

 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
         }
     });

     $('#search-input').on('input', function() {
         console.log('wrt');
         var locationurl = "{{ route('subtest.ajax') }}";
         var query = $(this).val();

         if (query.length >= 2) {

             $.ajax({
                 url: locationurl,
                 type: 'POST',
                 data: {
                     query: query
                 },
                 success: function(data) {
                     $('#search-results').empty();
                     if (data.length > 0) {
                         $.each(data, function(index, product) {
                             $('#search-results').append(
                                 '<a href="#" class="list-group-item list-group-item-action" data-id="' +
                                 product.id + '">' + product.sub_test_name + '</a>');
                         });
                     } else {
                         $('#search-results').append($('<option>', {
                             value: '',
                             text: 'No results found'
                         }));
                     }
                 },
                 error: function(error) {
                     console.log(error);
                 }
             });
         } else {

             $('#search-results').empty();
         }
     });



     $(document).on('click', '.list-group-item', function() {

         var productName = $(this).text();
         console.log('productname', productName);

         var subtest = $(this).data("id");
         console.log('subtest', subtest);

         $('#selectedProduct').val(subtest);
         $('#search-input').val(productName);
         $('#search-results').empty();
         $('#searchSubtest-form').off('submit').submit();

     });

     // ... (code for remove search item)
     $(document).ready(function() {

         $('.removeSelected').on("click", function() {
             //alert("Icon clicked!");
             var removeUrl = "{{ route('remove-test') }}";
             var selectedValues = $(this).data("id");

             console.log('>>', selectedValues)
             $.ajax({
                 url: removeUrl,
                 method: 'POST',
                 data: {
                     selectedValues: selectedValues
                 },
                 success: function(response) {
                     //window.location.reload();
                     $('#loadedViewContainer').html('');
                     $('#loadedViewContainer').html(response.html);
                     //window.location.reload();				 
                 }
             });
         });


         var currentTab = 1;
         var nextTab = 0;
         var totalTabs = $(".tab-pane").length;

         function showTab(tabNumber) {
             console.log('tabNumber', tabNumber)
             $(".tab-pane").removeClass("active");
             $("#tab" + tabNumber).addClass("active");
         }

         showTab(currentTab);

         $("#nextTab").click(function(e) {
             e.preventDefault();
             console.log('currentTab', currentTab)

             if (currentTab === 1) {
                 var errors = [];
                 var address = $('input[name="address"]:checked').val();

                 if (!address) {
                     errors.push('Please select an Address.');
                 }

                 if (errors.length > 0) {
                     var errorHtml = '<ul>';
                     errors.forEach(function(error) {
                         errorHtml += '<li>' + error + '</li>';
                     });
                     errorHtml += '</ul>';
                     Swal.fire({
                         icon: 'error',
                         html: errorHtml,
                     });
                 } else {
                     var iconUrl = '<i class="icofont-spinner-alt-6" style="padding:2px"></i>';
                     nextTab = currentTab + 1;
                     $('.Stepper_step').css('background-color', '#ccc');
                     $('.Stepper_step').eq(currentTab - 1).css('background-color', '#28a745');
                     $('.Stepper_step').eq(currentTab - 1).html('<i class="icofont-tick-mark"></i>');
                     //$('.Stepper_line').css('background','#28a745');
                     //$('.Stepper_line').css('background-position','50%')

                     showTab(nextTab);
                 }
             }
         });


         $('#pateint_tab_forward_btn').on('click', function(e) {
             e.preventDefault();

             if (nextTab === 2) {
                 var errors = [];
                 var patient = $('input[name="patient[]"]:checked').val();
                 if (!patient) {
                     errors.push('Please select an Patient.');
                 }
                 if (errors.length > 0) {
                     var errorHtml = '<ul>';
                     errors.forEach(function(error) {
                         errorHtml += '<li>' + error + '</li>';
                     });
                     errorHtml += '</ul>';

                     Swal.fire({
                         icon: 'error',
                         html: errorHtml,
                     });

                 } else {
                     nextTab = currentTab + 2;

                     $('.Stepper_step').css('background-color', '#ccc');
                     $('.Stepper_step').eq(currentTab - 1).css('background-color', '#1e7e34');
                     $('.Stepper_step').eq(currentTab - 1).html('<i class="icofont-tick-mark"></i>');
                     $('.Stepper_step').eq(currentTab).css('background-color', '#1e7e34');
                     $('.Stepper_step').eq(currentTab).html('<i class="icofont-tick-mark"></i>');
                     showTab(nextTab);
                 }
             }

         });


         $('#slot_tab_forward_btn').on('click', function(e) {
             if (nextTab === 3) {

                 var errors = [];

                 var slot_day = $('input[name="slot_day"]:checked').val();
                 var slot_time = $('input[name="slot_time"]:checked').val();
                 var pay_option = $('input[name="pay_option"]:checked').val();

                 console.log('currentTab3', currentTab)
                 console.log('slot_day', slot_day)
                 console.log('slot_time', slot_time)

                 if (!slot_day) {
                     errors.push('Please select a Date.');
                 }
                 if (!slot_time) {
                     errors.push('Please select a Time.');
                 }
                 if (!pay_option) {
                     errors.push('Please select a Pay Option.');
                 }
                 if (errors.length > 0) {
                     var errorHtml = '<ul>';
                     errors.forEach(function(error) {
                         errorHtml += '<li>' + error + '</li>';
                     });
                     errorHtml += '</ul>';

                     Swal.fire({
                         icon: 'error',
                         //title: 'Validation Errors',
                         html: errorHtml,
                     });
                 } else {

                     $('#checkout-form').off('submit').submit();
                 }
             }
         });


         if (currentTab > totalTabs) {
             currentTab = 1;
         }


     });


     $("#loadedViewContainer").on("click", ".removeSelected", function() {
         var removeUrl = "{{ route('remove-test') }}";
         var selectedValues = $(this).data("id");

         $.ajax({
             url: removeUrl,
             method: 'POST',
             data: {
                 selectedValues: selectedValues
             },
             success: function(response) {
                 //window.location.reload();
                 $('#loadedViewContainer').html('');
                 $('#loadedViewContainer').html(response.html);
                 //window.location.reload();				 
             }
         });
     });


     $(document).ready(function() {
         // Show all items on initial page load
         $('.filter-item').addClass('fade-in').show();
         // Handle button click event
         $('button').click(function() {
             var categoryId = $(this).attr('id');
             // Filter the items based on the button ID
             if (categoryId === 'btn-all') {
                 $('.filter-item').addClass('fade-in').show();
             } else {

                 $('.filter-item').hide().removeClass('fade-in');
                 $('.filter-item.' + categoryId).addClass('fade-in').show();
             }
         });

         $(".slick-next").on('click', function() {
             $('.filter-item').addClass('fade-in').show();
         });
         $(".slick-prev").on('click', function() {
             $('.filter-item').addClass('fade-in').show();
         });

     });


     $("#menu-toggle").click(function(e) {
         e.preventDefault();

         $("#wrapper").toggleClass("toggled");
         $('#wrapper').show();
     });

     $("#show_patient_btn").click(function(e) {
         console.log('>>>')
         e.preventDefault();
         $(this).hide();
         $('#patient-add').show();
         //$('#patient-list').hide();
     });


     $(".cart_remove").click(function(e) {
         e.preventDefault();
         var ele = $(this);
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
                     url: "{{ route('remove_product_from_cart') }}",
                     method: "DELETE",
                     data: {
                         _token: '{{ csrf_token() }}',
                         id: ele.parents("tr").attr("data-id")
                     },
                     success: function(response) {
                         window.location.reload();
                     }
                 });
             }
         });
     });


     $(".cart_update").change(function(e) {
         e.preventDefault();
         var ele = $(this);
         $.ajax({
             url: '{{ route('update_cart') }}',
             method: "patch",
             data: {
                 _token: '{{ csrf_token() }}',
                 id: ele.parents("tr").attr("data-id"),
                 quantity: ele.parents("tr").find(".quantity").val()
             },
             success: function(response) {
                 window.location.reload();
             }
         });
     });


     $(document).ready(function() {

     });

     $(document).on('click', '.delete_patient', function(e) {

         e.preventDefault();
         var id = $(this).data('id');
         var itemDiv = $(this).closest('.booking-container');

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
                     method: 'post',
                     url: "{{ route('deletepatient') }}",
                     data: {
                         id,
                         id
                     },
                     success: function(response) {
                         itemDiv.fadeOut('slow', function() {
                             $(this).remove();
                         });
                     }
                 })

             }

         })

     })


     $(document).on('click', '.otp-btn', function(e) {
         e.preventDefault();

         var phone = $('#mobile').val();
         var errors = [];

         if (phone.trim() === '') {
             errors.push('Phone no is required.');
         }
         if (errors.length > 0) {
             var errorHtml = '<ul>';
             errors.forEach(function(error) {
                 errorHtml += '<li>' + error + '</li>';
             });
             errorHtml += '</ul>';

             Swal.fire({
                 icon: 'error',
                 //title: 'Validation Errors',
                 html: errorHtml,
             });
         } else {
             $.ajax({
                 method: 'post',
                 url: "{{ route('otp.create') }}",
                 data: {
                     phone,
                     phone
                 },
                 success: function(response) {
                     if (response.status === 'success') {
                         $('.otp-btn').hide();
                         $('#send-otp').hide();
                         $('#verify-otp').show();
                         startTimer();
                     } else {

                         Swal.fire({
                             icon: 'error',
                             title: 'Login Error',
                             html: response.message,
                         });
                     }
                 }
             })
         }

     })

     var timer = null;
     var minutes = 10;
     var seconds = 0;

     function startTimer() {
         timer = setInterval(function() {
             if (minutes == 0 && seconds == 0) {
                 clearInterval(timer);
                 document.getElementById('resend-link').style.display = 'block';
             } else {
                 if (seconds == 0) {
                     minutes--;
                     seconds = 59;
                 } else {
                     seconds--;
                 }

                 // Display the updated time
                 document.getElementById('minutes').textContent = minutes;
                 document.getElementById('seconds').textContent = seconds < 10 ? '0' + seconds : seconds;
             }
         }, 1000);
     }



     $(document).on('click', '#btn-verify-otp', function() {

         var otps = $('input[type="number"][name="otp[]"]');
         var phone = $('#mobile').val();

         console.log('>>', otps);

         var dataToSend = {};

         // Convert the serialized data to an object
         $.each(otps, function(index, element) {
             // Check if the key (input name) already exists in the dataToSend object
             if (dataToSend[element.name]) {
                 // If it exists, convert it to an array and push the new value
                 if (!Array.isArray(dataToSend[element.name])) {
                     dataToSend[element.name] = [dataToSend[element.name]];
                 }
                 dataToSend[element.name].push(element.value);
             } else {
                 // If it doesn't exist, create a new key-value pair
                 dataToSend[element.name] = element.value;
             }
         });

         dataToSend['phone'] = phone;

         $.ajax({

             url: "{{ route('otp.verify') }}",
             data: dataToSend,
             method: 'post',
             success: function(response) {
                 if (response.status === 'success') {
                     Swal.fire({
                         icon: 'success',
                         //title: 'Login Error',
                         html: response.message,
                     }).then((result) => {
                         if (result.isConfirmed) {
                             window.location.href = response.redirectTo;
                         }
                     })
                 } else {
                     Swal.fire({
                         icon: 'error',
                         //title: 'Login Error',
                         html: response.message,
                     })
                 }
                 //console.log(response);
             }
         })

     })
 </script>

 <script>
     APP_URL = '{{ url('/') }}';
 </script>
 @yield('page_specific_js')

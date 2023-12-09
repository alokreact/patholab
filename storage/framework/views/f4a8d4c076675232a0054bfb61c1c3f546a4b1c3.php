 
 
 <?php $__env->startSection('content'); ?>
    <div id="loader"
         class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center z-50 hidden">
         <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-12 w-12"></div>
     </div>

     <section class="section contact-info pb-0">
        <div class="container mx-auto">
      
            <?php echo $__env->make('Front-end.Components.breadcrumb',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="flex flex-col md:flex-row">

                 <?php echo $__env->make('Front-end.Components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <div class="w-full md:w-2/3 p-4">
                   
                    <div id="testChip" class="mt-1 mb-2 flex flex-row p-3 flex-wrap chip"></div>

                    <div class="flex flex-wrap mx-2" id="searchHaederResult">
                    </div>
                </div>
            </div>
        </div>

    </section>
 <?php $__env->stopSection(); ?>

 <?php $__env->startPush('after-scripts'); ?>
     <script>
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
             }
         });

         APP_URL = '<?php echo e(url('/')); ?>';
         
         var urlParams = new URLSearchParams(window.location.search);
         
         console.log('appendedData', urlParams)
         
         var appendedData = urlParams.get('data');
         var newItem = appendedData; // Replace with the value you want to add
         var existingData = localStorage.getItem('testArr');        
         // If the key doesn't exist, create an empty array
        var testArr = existingData ? JSON.parse(existingData) : [];
        console.log('testArr',testArr)

        if (!testArr.includes(newItem)) {     
            
            testArr.push(newItem);
            // Save the updated array back to local storage
            localStorage.setItem('testArr', JSON.stringify(testArr));
        } 
  
         $.ajax({
             'url': APP_URL + '/search-test',
             'data': {
                 test_id: testArr
             },
             'method': 'POST',
             
             success: function(response, textStatus, xhr) {
                 var testDiv = '';
                 var searchDiv = '';
                 if (xhr.status === 200) {
                     $.each(response.tests, function(index, data) {
                         var imageName = APP_URL + '/Image/' + data.image;
                         //console.log('imageName',imageName)
                         testDiv += '<div class="w-full md:w-[31%] mb-4 border mx-2">';
                         testDiv += '<div class="border-b-2 rounded w-[260px] h-[144px] p-3 mx-auto">';
                         testDiv += ' <img src=" ' + imageName + ' "/>';
                         testDiv += '</div>';

                         testDiv += '<div class="p-4 mt-2 items-center flex justify-between">';
                         testDiv += '<h6 class="text-black text-basic font-semibold mb-2">';
                         testDiv +=
                             '<i class="icofont-google-map" style="font-size:16px;color:#000"></i>Hyderabad</h6>';
                         testDiv +=
                             '<button class="w-[120px]  border-green-500 text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white btn_add_to_cart_test" value="' +
                             data.test_ids + '" data-type="test" data-lab="' + data.lab_id + '"';
                         testDiv += 'data-price="' + data.total_price + '"';
                         testDiv += 'data-singleprice="' + data.single_price + '">';
                         testDiv += 'Add To Cart</button></div>';
                         testDiv +=
                             ' <div class="p-3 mt-1 mb-1 items-center bg-gray-100 flex justify-between my-1 mx-1 rounded-full text-black">';
                         testDiv += '<del>₹<span>' + data.total_price * 2 + '/-</span></del>';
                         testDiv += '<span>₹' + data.total_price + '/-</span>';
                         testDiv += '<div class="sm">50% discount </div>';
                         testDiv += '</div> </div>';
                     })
                     $.each(response.searchTerms.name, function(index, data) {
                         var id = response.searchTerms.id[index];
                         searchDiv += '<p class="ml-2">';
                         searchDiv += data +
                             '<i class="icofont-close-circled close_search_btn" data-id="' + id +
                             '"></i>,</p>'
                             
                             ;
                     });
                     $('#loader').addClass('hidden');
                     $('#searchHaederResult').html(testDiv);
                     $('#searchBreadcumb').removeClass('hidden');
                     $('#testChip').html(searchDiv);
                 }
             }
         })

         $(document).on('click','.close_search_btn', function(){  
           
            $('#loader').removeClass('hidden');
            
            var testId = $(this).attr('data-id');
            var existingData = localStorage.getItem('testArr');    


            var dataArray = JSON.parse(existingData);
            
            if(dataArray.includes(testId)) {     
            
                let indexToRemove = dataArray.indexOf(testId);

                if (indexToRemove !== -1) {
                    dataArray.splice(indexToRemove, 1);
                }
                // Save the updated array back to local storage
                localStorage.setItem('testArr', JSON.stringify(dataArray));
            }
            
            //console.log('>>>working',testArr);return;

            //console.log('lenght',dataArray);return

            if(dataArray.length < 1){

                window.location.href = APP_URL;    
                return;
            }

            else{

                $.ajax({
                url :APP_URL+'/remove-test',
                method:'POST',
                data:{dataArray},
                success:function(response,textStatus,xhr){
                    var testDiv ='';
                    var searchDiv ='';  
            
                    if(xhr.status === 200){
                        $.each(response.tests ,function(index,data){
                            var imageName = APP_URL+'/Image/'+data.image;
                            //console.log('imageName',imageName)
                                testDiv += '<div class="w-full md:w-[31%] mb-4 border mx-2">';
                                testDiv += '<div class="border-b-2 rounded w-[260px] h-[144px] p-3 mx-auto">';
                                testDiv +=' <img src=" '+ imageName+' "/>';
                                testDiv +='</div>';

                                testDiv +='<div class="p-4 mt-2 items-center flex justify-between">';
                                testDiv +='<h6 class="text-black text-basic font-semibold mb-2">';
                                testDiv += '<i class="icofont-google-map" style="font-size:16px;color:#000"></i>Hyderabad</h6>';
                                testDiv += '<button class="w-[120px]  border-green-500 text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white btn_add_to_cart_test" value="+data.id+" data-type="test" data-lab="+data.lab_id+"';
                                testDiv += 'data-price="+data.total_price+"';
                                testDiv += 'data-singleprice="+data.single_price+">';
                                testDiv += 'Add To Cart</button></div>';
                                testDiv += ' <div class="p-3 mt-1 mb-1 items-center bg-gray-100 flex justify-between my-1 mx-1 rounded-full text-black">';
                                testDiv +='<del>₹<span>'+ data.total_price *2 + '/-</span></del>';
                                testDiv +='<span>₹'+ data.total_price + '/-</span>';
                                testDiv +='<div class="sm">50% discount </div>';
                                testDiv +='</div> </div>';
                            })

                            $.each(response.searchTerms.name ,function(index,data){  
                                var id = response.searchTerms.id[index];
                                searchDiv += '<p>';
                                searchDiv +=  data + ' <i class="icofont-close-circled  close_search_btn" data-id="'+id+'"></i></p>';
                            });  
            
                            $('#loader').addClass('hidden');
                     $('#searchHaederResult').html(testDiv);
                     $('#searchBreadcumb').removeClass('hidden');
                     $('#testChip').html(searchDiv);
                    }
                }
            })

            }
    
            console.log('>>>working',testArr);

            
})
     </script>
 <?php $__env->stopPush(); ?>

<?php echo $__env->make('Front-end.layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\patholab\resources\views/Front-end/Search/search-result.blade.php ENDPATH**/ ?>
 @extends('Front-end.layout.mainlayout')
 @section('content')
     <div id="searchHaederResult">

     </div>
 @endsection


 @push('after-scripts')
     <script>

        $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

         APP_URL = '{{ url('/') }}';

         var urlParams = new URLSearchParams(window.location.search);
         console.log('appendedData', urlParams)
         var appendedData = urlParams.get('data');
         console.log('appendedData', appendedData)

         $.ajax({
        url:APP_URL+'/search/test',
        data:{checkBoxValue:appendedData},
        method:'POST',

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
                        testDiv += '<button class="w-[120px]  border-green-500 text-green-500 rounded-full border p-2 hover:bg-green-500 hover:text-white btn_add_to_cart_test" value="'+data.test_ids+'" data-type="test" data-lab="'+data.lab_id+'"';
                        testDiv += 'data-price="'+data.total_price+'"';
                        testDiv += 'data-singleprice="'+data.single_price+'">';
                        testDiv += 'Add To Cart</button></div>';
                        testDiv += ' <div class="p-3 mt-1 mb-1 items-center bg-gray-100 flex justify-between my-1 mx-1 rounded-full text-black">';
                        testDiv +='<del>₹<span>'+ data.total_price *2 + '/-</span></del>';
                        testDiv +='<span>₹'+ data.total_price + '/-</span>';
                        testDiv +='<div class="sm">50% discount </div>';
                        testDiv +='</div> </div>';
                    })

                $.each(response.searchTerms.name ,function(index,data){  
                    
                    console.log(data)
                    var id = response.searchTerms.id[index];
                    searchDiv += '<div class="chip">';
                    searchDiv +=  data + ' <i class="icofont-close-circled remove_search_btn" data-id="'+id+'"></i></div>';
                });  

                $('#count_result').hide();
                $('#organResult').hide();
                $('#loader').addClass('hidden');    
                $('#searchHaederResult').html(testDiv);
                $('#test_header').hide();
                $('#searchBreadcumb').removeClass('hidden');
                //$('#chipResult').html(searchDiv);
            }
        }
    })

     </script>
 @endpush

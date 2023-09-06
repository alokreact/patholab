<?php 
use App\Models\Category;
use App\Models\GroupTest;
use App\Models\SubTest;



if (!function_exists('category_count')) {


    function category_count($id){

        //$cats = Category::all();

        $subtest = GroupTest::withCount('subtest')->find($id);
    

        //echo $subtest->subtest_count;

        return $subtest->subtest_count;

    }
}


if (!function_exists('itemExistsInCarts')) {

 function itemExistsInCarts($itemId, &$cart)
    {
        foreach ($cart as &$item) {
            if ($item['lab_name'] == $itemId) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('packageExistsInCarts')) {

    function packageExistsInCarts($itemId, &$cart)
       {
           foreach ($cart as &$item) {
               if ($item['name'] == $itemId) {
                   return true;
               }
           }
           return false;
       }
   }

    ?>
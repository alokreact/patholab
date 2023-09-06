<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\SubTest;
use App\Models\User;
use App\Models\Package;
class AddToCartTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void{
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user);

    }
    // public function test_add_to_cart(){
    //     $test = SubTest::factory()->create();
    //     //dd($test);
    //     $response = $this->get(route('add_to_cart',$test->id))->assertOk();
    // }

    // public function test_add_to_cart_package(){
    //     $package = Package::factory()->create();
    //     $response = $this->get(route('add_to_cart',$package->id))
    //                 ->assertOk();
    // }

    // public function test_create_order_from_testcart(){
    //     $test = SubTest::factory()->create();
    //     $cart = $this->get(route('add_to_cart',$test->id))->assertOk();
       
    //     //dd($cart['data']['session_id']);
       
    //     $response =  $this->get(route('checkout',$cart['data']['session_id']))
    //                  ->assertCreated();
    // }

    // public function test_create_order_from_packagecart(){
    //     $package = Package::factory()->create();
       
    //     $cart = $this->post(route('checkout.submit'))->assertOk();
       
    //     // $response =  $this->get(route('checkout',$cart['data']['session_id']))
    //     //              ->assertCreated();
    // }

    public function test_item_can_be_added_to_the_cart()
    {
        Package::factory()->count(3)->create();

        $this->post('/cart', [
            'id' => 1,
            'type'=>'package'
        ])
        ->assertRedirect('/cart')
        ->assertSessionHasNoErrors()
        ->assertSessionHas('cart.0', [
            'id' => 1,
            'qty' => 1,
            'type'=>'package'
        ]);   
    }

    public function test_same_item_can_not_be_added_cart_twice(){

        //$this->withExceptionHandeling();
        $this->withoutExceptionHandling();

        $package1= Package::factory()->create();
        $package2= Package::factory()->create();
        $package3= Package::factory()->create();

        $this->post('/cart',['id'=>1]);
        $this->post('/cart',['id'=>1]);
        $this->post('/cart',['id'=>2]);
        $this->assertEquals(2, count(session('cart')));
    }

    public function test_items_added_to_the_cart_can_be_seen_in_the_cart_page(){

        $this->withoutExceptionHandling();
   
        $package1= Package::factory()->create();
        $package2= Package::factory()->create();

        $this->post('/cart', [
            'id' => $package1->id, // Taco
        ]);
        $this->post('/cart', [
            'id' => $package2->id, // BBQ
        ]);
    
        $cart_items = [
            [
                'id' => $package1->id,
                'qty' => 1,
                'name' => $package1->name,
                'lab_name' => $package1->lab->lab_name,
                'price' => $package1->price,
            ],
            [
                'id' => $package2->id,
                'qty' => 1,
                'name' => $package2->name,
                'lab_name' => $package2->lab->lab_name,
                'price' => $package2->price,
            ],
        ];


        $this->get('/cart')->assertOk()
        ->assertViewHas('cart_items', $cart_items)
        //  ->assertSeeTextInOrder([
        //     $package1->name,
        //     $package2->name
        //  ])
        // ->assertTrue(collect($cart_items)->contains($package2->name))
         ->assertDontSeeText('Pizza');



    }

}

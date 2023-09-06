<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\SubTest;
use App\models\GroupTest;

class GrouptestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_grouptest(){
        
        $test1 = SubTest::factory()->create();
        $test2 = SubTest::factory()->create();    
        $response = $this->post(route('grouptest.store',['name'=>'Group test1',
                                        'sub_test'=>[$test1->id,$test2->id]
                                        ]));
        $response->assertRedirect();
        $this->assertDatabasehas('grouptests',['name'=>'Group test1']);
    }

    // public function test_validate_store_grouptest()
    // {
    //     $test1 = SubTest::factory()->create();
    //     $test2 = SubTest::factory()->create();    
    //     $response = $this->post(route('grouptest.store',['name'=>'Group test1',
    //                                     'sub_test'=>[$test1->id,$test2->id]
    //                                     ]));
    //     $response->assertRedirect();
    //     $this->assertDatabasehas('grouptests',['name'=>'Group test1']);
    // }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\Lab;
use Illuminate\Support\Facades\Storage;


class LabTest extends TestCase
{
    use RefreshDatabase;
    public function test_remove_old_image_while_update(){
     //   $this->withExceptionHandling();
        $response = $this->post(route('lab.store'), [ 
                                    'lab_name'=>'test1_name',
                                    'address1'=>'test1_name',
                                    'state'=>'test2_name',
                                    'city'=>'test2_name',
                                    'pin'=>'237156',
                                    'phone'=>'1904567898',
                                    'image'=>UploadedFile::fake()->image('photo2.jpg'),
                                    'status'=>1
                                ]);

        $this->assertDatabaseCount('labs', 1);
        $response->assertRedirect();
        $this->assertDatabaseHas('labs', ['lab_name'=>'test1_name']);
        $lab= Lab::first();
       
        $this->assertTrue(file_exists(public_path('Image/'.$lab->image)));

        $res = $this->put(route('lab.update',$lab->id),[ 
                                        'lab_name'=>'test_name',
                                        'address1'=>'test_name',
                                        'state'=>'test_name',
                                        'city'=>'test_name',
                                        'pin'=>'234156',
                                        'phone'=>'1234567898',
                                        'image'=>UploadedFile::fake()->image('photo3.jpg'),
                                        'status'=>1
                                    ]);

           $this->assertDatabaseMissing('labs',['lab_name'=>$lab->name]);
            $this->assertFalse(file_exists(public_path('Image/'.$lab->image)));
            $res->assertRedirect('/');
    }
}

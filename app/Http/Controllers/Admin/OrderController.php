<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Prescription;
use App\Models\User;
use App\Models\SubTest;
use App\Models\Report;
use App\Models\Patient;
use App\Models\Address;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Service\PdfService;

use Symfony\Component\HttpFoundation\Response;

use App\Service\OrderService;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('lab')->get();
       // dd($orders);

        return view('Admin.Order.list', compact('orders'));
    }

    public function download($id){

        $order =  Order::find($id);
        $user  =  User::where('id', $order->user_id)->get();
        if($order){
        $orderItems =  OrderItem::where('order_id', $order->id)->get();
        //dd($orderItems);

       if(count($orderItems)>0){

            $type = $orderItems->pluck('type');  
        
            $tests =[];
            //dd($type);

            if($type[0]==='package' ){
             
                $orderItems = OrderItem::with('package')->where('order_id', $order->id)->get();
                $patients = Patient::find(explode(',',$order->patient_id));     
                $address = Address::find($order->user_address);
        
                $data['product_names'] = OrderService::getProductNamesForAdmin($orderItems, $type[0]);
                $data['items'] = OrderService::getLabNames($orderItems,$type);

                //dd($data['items']);
                $data['total'] = $order->total;
                $data['date'] = now();
                $data['order_id'] = $order->recieptId;
                $data['address'] = $address;
                $data['patients'] = $patients;
                $data['slot_day'] = $order->order_date;
                $data['slot_time'] = $order->collection_time;
                $data['phone']  = $user[0]->phone;               
                
                $pdf = PDF::loadView('emails.order', compact('data'));
                return $pdf->download('invoice.pdf');
            }
            else{

                $orderItems = OrderItem::with('subtest')->where('order_id', $order->id)->get();
                //dd($orderItems);
                $patients = Patient::find(explode(',',$order->patient_id));
                $address = Address::find($order->user_address);
                $data['product_names'] = OrderService::getProductNamesForAdmin($orderItems,'test');

                $data['total'] = $order->total;
                $data['items'] = OrderService::getLabNames($orderItems,'test');

                $data['date'] = now();
                $data['order_id'] = $order->recieptId;
                $data['slot_day'] = $order->order_date;
                $data['slot_time'] = $order->collection_time;
                $data['address'] = $address;
                $data['patients'] = $patients;                  
                
                $data['phone']  = $user[0]->phone;               
                //dd($data['patients']->age);

                $pdf = PDF::loadView('emails.order', compact('data'));
                return $pdf->download('invoice.pdf');
        
            }
        }
        else{
            abort('404');
        }
        
    }
        else
        {
        abort('404');
        }   
    }

    public function show_order(Request $request){   
       //dd($request->all());
        
        $tests =  OrderItem::where('order_id', $request->itemId)->get();
        //dd($tests);

        $subtests =[];

        if($tests ->count() >0){
        
            foreach($tests as $test){
                if($test ['type'] ==='package'){
                    $packages = OrderItem::with('package.getLab')->where('order_id', $request->itemId)->get();
                    //dd($packages);
                    //$packages = $tests->pluck('package')->toArray();
                    $data = [
                        'packages' => $packages,
                    ];   
                }
                else{
                    //$test_id = explode(',',$tests[0]['product_id']);
                    //$subtests =  SubTest::find($test_id);
                    $order_items = OrderItem::with('subtest','lab')->where('order_id',$request->itemId)->get();
                    $subtests = $order_items->toArray();
                
                    //dd($subtests);   
                    $data = [
                        'subtest' => $subtests,
                        'order_items'=>$tests,
                        'packages'=>[]
                    ];
                }
            }
        
            //dd($data['packages']);
            if(count($data['packages']) >0){
                return view('Admin.Order.packagedetails',compact('data'));
            }
            else{
                return view('Admin.Order.testdetails',compact('data'));
            }
        }
        else{

            abort(404);
        }
        //dd($data);
    }

    public function prescription_show(){
        $prescriptions =  Prescription::all();
        return view('Admin.Order.prescription', compact('prescriptions'));
    }

    public function download_prescription($id){
        $prescription =  Prescription::find($id);
        $path =  public_path('images/reports/'.$prescription->report);
        return response()->download($path, $prescription->report);
        //return view('Admin.Order.prescription', compact('prescriptions'));
    }


    public function uploadReport(Request $request){

        if($request->hasFile('file')) {   
            $file=  $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/reports/'), $filename);

            $OrderItem = OrderItem::find($request->input('testId')); // Replace OrderItem with your actual model name
            $OrderItem->report_url = $filename;
            
            $OrderItem->save();

            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        return response()->json(['success' => false, 'message' => 'No file found']);
    }

    public function getRecord(Request $request){

        $record = OrderItem::find($request->input('recordId'));
        //dd($record['report_url']);
        //return view('Admin.Order.modal_details', compact('record'));
        $html = view('Admin.Order.modaldetails',compact('record'))->render();
    
        //dd($html);
        return response()->json(['html' => $html]);
    }

    public function uploadnewReport(Request $request){

        if($request->hasFile('file')) {   
            $file=  $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/reports/'), $filename);

            $OrderItem = OrderItem::find($request->input('id')); // Replace OrderItem with your actual model name
            
            $OrderItem->report_url = $OrderItem['report_url'].','.$filename;
            $OrderItem->save();
            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        return response()->json(['success' => false, 'message' => 'No file found']);
    }

    public function changeOrderStatus(Request $request){

        //dd($request->all());

        $order = Order::find($request->input('order_id'));
        $order->order_status = $request->input('order_status');
        $order->update();

        return response()->json(['message'=>'Order Status Changed Successfully'], Response::HTTP_OK);

    }
}

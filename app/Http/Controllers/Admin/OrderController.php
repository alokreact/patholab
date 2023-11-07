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

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;

use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('lab')->get();
       // dd($orders);

        return view('Admin.Order.list', compact('orders'));
    }

    public function download($id){
        //echo $id;die;
        $order =  Order::find($id);
        $user  =  User::where('id', $order->user_id)->get();
        $tests =  OrderItem::with('subtest', 'package')->where('order_id', $order->id)->get();
        //dd($tests);
        //return view('Admin.Invoice.invoice', compact('order','user','tests'));
        $pdf = PDF::loadView('Admin.Invoice.invoice', compact('order', 'user', 'tests'));
        return $pdf->download('invoice.pdf');
    }

    public function show_order(Request $request){   
       //dd($request->all());
        $tests =  OrderItem::where('order_id', $request->itemId)->get();
        //dd($tests);
        $subtests =[];

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
            $file->move(public_path('Image'), $filename);

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

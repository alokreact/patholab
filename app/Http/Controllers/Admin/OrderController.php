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

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
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
        $tests =  OrderItem::where('order_id', $request->itemId)->get();
        //dd($tests);
       
       // $reports = Report::where('order_id', $request->itemId)->get();
       // dd($reports);

        //dd($tests[0]['product_id']);
        foreach($tests as $test){
            if($test ['type'] ==='package'){
                $packages =  OrderItem::with('package')->where('order_id', $request->itemId)->get();
            }
            else{
                // $test_id = explode(',',$tests[0]['product_id']);
                 //$subtests =  SubTest::find($test_id);
                 $order_items = OrderItem::with('subtest')->where('order_id',$request->itemId)->get();
                //dd($order_items);
            }
        }
        // $combinedResults =[];

        // foreach ($reports as $report) {
        //         $test_id = $report->test_id;
        //         if (!array_key_exists($test_id, $combinedResults)) {
        //             $combinedResults[$test_id] = [
        //                 'test_id' => $report->test_id,
        //                 'user_id' => $report->user_id,
        //                 'order_id'=>$report->order_id,
        //                 'report_url'=>$report->report_url
        //             ];
        //         }
        //     }

       //dd($combinedResults);
        $packages = $tests->pluck('package')->toArray();
        $subtests = $order_items->toArray();
        //dd($subtests);
        $data = [
            'packages' => $packages,
            //'package' => $tests->package->pluck('package_name')->toArray(),
            'subtest' => $subtests,
            'order_items'=>$tests,
        ];
        //dd($data);
        return view('Admin.Order.testdetails',compact('data'));
    }

    public function prescription_show(){
        $prescriptions =  Prescription::all();
        return view('Admin.Order.prescription', compact('prescriptions'));
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
            $file->move(public_path('Image'), $filename);

            $OrderItem = OrderItem::find($request->input('id')); // Replace OrderItem with your actual model name
            
            //dd($OrderItem['report_url']);

            $OrderItem->report_url = $OrderItem['report_url'].','.$filename;
            
            $OrderItem->save();

            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        return response()->json(['success' => false, 'message' => 'No file found']);
    }
}

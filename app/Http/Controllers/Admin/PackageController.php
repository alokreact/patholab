<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lab;
use App\Models\Category;
use App\Models\GroupTest;
use App\Models\Package;


class PackageController extends Controller
{

    public function create()
    {

        $labs = Lab::all();
        $categories = Category::all();
        $grouptests = GroupTest::all();
        //dd($grouptests);
        return view('Admin.Package.create', compact('labs', 'categories', 'grouptests'));
    }
    public function index()
    {

        $packages = Package::all();
        //dd($packages);
        return view('Admin.Package.index', compact('packages'));
    }
    public function store(Request $request)
    {

        $data = $request->all();
        //dd($data);
        try {
            \DB::beginTransaction();

            $package = Package::create([
                'package_name' => $request->package_name,
                'package_desc' => strip_tags($request->package_desc),
                'category' => $request->category,
                'lab_name' => $request->lab_name,
                'price' => $request->price
            ]);

            $grouptest = $request->group_test_id;

            $package->grouptest()->sync($grouptest);

            \DB::commit(); // Tell Laravel this transacion's all good and it can persist to DB
            return redirect()->back()->with('message', 'Package added successfully');
        } catch (\Exception $exp) {
            dd($exp->getMessage());
            \DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            return redirect()->back()->with('message', 'Some Error!');
            //throw  $exp;
            //return response(['success=>false, 'message'=>$e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $package = Package::find($id);
        $labs = Lab::all();
        $categories = Category::all();
        $grouptests = GroupTest::all();
        $selectedValues = collect($package->grouptest()->pluck('parent_test_id')->toArray());

        return view('Admin.Package.edit', compact('package', 'labs', 'categories', 'grouptests', 'selectedValues'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);

        // Update the main record's attributes
        //$mainRecord->attribute1 = $newValue1;

        $package->package_name = $request->package_name;
        $package->package_desc = $request->package_desc;
        $package->category = $request->category;
        $package->lab_name = $request->lab_name;
        $package->price = $request->price;
        // Save the changes to the main record
        $package->save();

        $grouptest = $request->group_test_id;
        $package->grouptest()->sync($grouptest);

        return redirect()->back()->with('message','Updated Successfully');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('package.index')->with('message', 'Deleted Succesfully');
    }
}

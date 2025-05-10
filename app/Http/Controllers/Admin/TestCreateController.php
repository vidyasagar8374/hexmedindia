<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Exports\TestList;
use Excel;
class TestCreateController extends Controller
{
    public function managetest(){
        $tests = Test::latest('id')->get();
        return view('admin.managetest', compact('tests'));
    }
    public function exportest(){
        return Excel::download(new TestList,'managetest.xlsx');
    }

    public function testedit(){
        return view('admin.testediting');
    }

    public function newtestedit(){
        return view('admin.newtestedit');
    }
    public function createnewtest(Request $request){
        try{
            $newTest = new Test;
            $newTest->name= str_replace(',', '',  $request->name);
            $newTest->price= $request->price;
            $newTest->total_price= $request->adminprice;
            $newTest->isactive= $request->status;
            $newTest->save();
            return redirect()->back()->with('message', 'New Test Created Successfully!');
        }catch(\Exception $e){
            \Log::error($e);
            return redirect()->back()->with('message', 'Opps! Something Went wrong');
        }
    }
    public function testeditinfo(Request $request, $id){
        $testRecord = Test::where('id', decrypt($id))->first();
        return view('admin.testupdate', compact('testRecord', 'id'));
    }
    public function testupdate(Request $request){
        try{
            
            $updateRecord = Test::where('id', decrypt($request->id))->update([
                'name' => str_replace(',', '',  $request->name),
                'price' => $request->price,
                'total_price' => $request->adminprice,
                'isactive' => $request->status
            ]);
            return redirect()->back()->with('message', 'Test Details Updated');
        }catch(\Exception $e){
            \Log::error($e);
            return redirect()->back()->with('message', 'Opps! Something Went wrong');
        }
    }
    public function editpackageinfo($id)
    {
        $data = Package::where('id', decrypt($id))->with(['details.testdetails'])->first();
        $testsinfo = Test::where('isactive', 'Active')->get();
        
        return view('admin.editpackagesinfo', compact('data', 'testsinfo'));
    }
    public function deletetest(Request $request){
        try{
            $deletePackage = PackageDetail::where('package_id', $request->package)->where('test_id', $request->id)->delete();
            return 1; 
        }catch(\Exception $e){
            return 0;
        }
        
    }
}

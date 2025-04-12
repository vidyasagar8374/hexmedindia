<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollectionAgent;

class GetSupportController extends Controller
{
    public function getsupport(){
        return view('admin.getsupport');
    }
    public function collectionagents(){
        $boys = CollectionAgent::get();
        return view('admin.collectionagents', compact('boys'));
    }
    public function addcollectionagent(){
        return view('admin.addcollectionagent');
    }
    public function insertnewcollection(Request $request){
        $create = new CollectionAgent;
        $create->name = $request->name;
        $create->mobile = $request->mobile;
        $create->address = $request->address;
        $create->status = $request->status;
        $create->save();
        return redirect()->back()->with('message', 'Boy Created successfully');

    }
}

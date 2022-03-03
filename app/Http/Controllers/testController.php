<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        $data = Brand::paginate(2);
        return view('test.manage',compact('data'));
    }
    public function get_data(Request $request){
        $data = Brand::paginate(2);
        return view('test.pagination',compact('data'));
    }
}

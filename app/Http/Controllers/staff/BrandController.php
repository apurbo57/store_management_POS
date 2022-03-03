<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('user')->get();
        return view('backend.brand.manage',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:10|unique:brands',
            'status' => 'required|string',
        ]);

        try{
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->slug = slugify($request->name);
            $brand->status = $request->status;
            $brand->create_by = auth()->id();
            $brand->save();
            
            setMessage('success','Brand Add Successfully!');
        } catch (Exception $e) {
            setMessage('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            return view('backend.brand.edit',compact('brand'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:10|unique:brands,id,'.$id,
            'status' => 'required|string'
        ]);

        try{
            $brand = Brand::find($id);
            $brand->name = $request->name; 
            $brand->slug = slugify($request->name);
            $brand->status = $request->status;
            $brand->create_by = auth()->id();
            $brand->update();

            setMessage('success', 'Brand Update Successfully!');
        } catch(Exception $e){
            setMessage('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        setMessage('success', 'Brand Delete Successfully!');
        return redirect()->back();
    }
}

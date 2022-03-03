<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('root',0)->get();
        return view('backend.category.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('root',0)->get();
        return view('backend.category.create',compact('categories'));
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
            'name' => 'required|string|min:4|max:30|unique:categories',
            'root' => 'required|integer',
            'status' => 'required|string',
        ]);

        try{
            $category = new Category();
            $category->root = $request->root;
            $category->name = $request->name;
            $category->slug = slugify($request->name);
            $category->status = $request->status;
            $category->create_by = auth()->id();
            $category->save();
            
            setMessage('success','Category Add Successfully!');
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
        $cat = Category::find($id);
        if ($cat) {
            $categories = Category::where('root',0)->get();
            return view('backend.category.edit',compact('cat','categories'));
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
            'name' => 'required|string|min:4|max:30|unique:categories,id,'.$id,
            'root' => 'required|integer',
            'status' => 'required|string',
        ]);

        try{
            $category = Category::find($id);
            $category->root = $request->root;
            $category->name = $request->name;
            $category->slug = slugify($request->name);
            $category->status = $request->status;
            $category->create_by = auth()->id();
            $category->update();
            
            setMessage('success','Category Updated Successfully!');
        } catch (Exception $e) {
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
        $cat = Category::where('root', $id)->get();

        if (!count($cat)) {
            $category = Category::find($id);
            $category->delete();
            setMessage('success','Yah :) Category Delete Successfully!');
        }else{
            setMessage('danger','It has Sub-Category, Please first delete the Sub-Category');
        }

        return redirect()->back();
    }
}

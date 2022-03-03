<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Post::with('brand')->get();
        return view('backend.product.manage',compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status','active')->select('id','name')->get();
        $categories = Category::where('root',0)->where('status','active')->select('id','name')->get();
        return view('backend.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'buing_price' => 'required',
            'quantity' => 'required',
            'sku_code' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }else{
            try{

                Post::create([
                    'name'              => $request->name,
                    'slug'              => $request->slug,
                    'category_id'       => $request->category_id,
                    'brand_id'          => $request->brand_id,
                    'model'             => $request->model,
                    'buing_price'       => $request->buing_price,
                    'special_price'     => $request->special_price,
                    'special_price_from' => $request->special_price_from,
                    'special_price_to'  => $request->special_price_to,
                    'quantity'          => $request->quantity,
                    'sku_code'          => $request->sku_code,
                    'color'             => json_encode($request->color),
                    'size'              => json_encode($request->size),
                    'warranty'          => $request->warranty,
                    'warranty_duration' => $request->warranty_duration,
                    'warranty_condition' => $request->warranty_condition,
                    'description'       => $request->description,
                    'status'            => $request->status
                ]);
                return response()->json(['success' => 'Product Add Successfully!']);
            }catch(Exception $e){
                return response()->json(['unable' => $e->getMessage()]);
            }
        }
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
        $post = Post::find($id);
        $brands = Brand::where('status','active')->select('id','name')->get();
        $categories = Category::where('root',0)->where('status','active')->select('id','name')->get();
        return view('backend.product.edit',compact('post','categories','brands'));

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
        $validator = validator::make($request->all(),[
            'name' => 'required|unique:posts,id,'.$id,
            'slug' => 'required|unique:posts,id,'.$id,
            'buing_price' => 'required',
            'quantity' => 'required',
            'sku_code' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }else{
            try{
                $posts = Post::find($id);
                $posts->name = $request->name;
                $posts->slug = $request->slug;
                $posts->category_id = $request->category_id;
                $posts->brand_id = $request->brand_id;
                $posts->model = $request->model;
                $posts->buing_price = $request->buing_price;
                $posts->special_price = $request->special_price;
                $posts->special_price_from = $request->special_price_from;
                $posts->special_price_to = $request->special_price_to;
                $posts->quantity = $request->quantity;
                $posts->sku_code = $request->sku_code;
                $posts->warranty = $request->warranty;
                $posts->warranty_duration = $request->warranty_duration;
                $posts->warranty_condition = $request->warranty_condition;
                $posts->description = $request->description;
                $posts->status = $request->status;
                $posts->update();

                setMessage('success','Product Updated Successfully!');
            }catch(Exception $e){
                setMessage('danger', $e->getMessage());
            }
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);

        $posts->delete();

        setMessage('success','Yah :) Product Delete Successfully!');

        return redirect()->back();
    }
}

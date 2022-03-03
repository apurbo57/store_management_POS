<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\sell;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class sellController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Post::get();
        return view('backend.sell.sell_product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sells = sell::orderBy('id','DESC')->get();
        return view('backend.sell.recently_sell',compact('sells'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell = sell::find($id);
        return view('backend.sell.edit',compact('sell'));
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
        $product = sell::find($id);
        $product->name = $request->name;
        $product->phone = $request->phone;
        $product->address = $request->address;
        $product->productName = $product->productName;
        $product->quantity = $request->quantity;
        $product->sPrice = $request->sPrice;
        $product->update();
        setMessage('success','Sell Product Updated!');
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
        $posts = sell::find($id);

        $posts->delete();

        setMessage('success','Yah :) Sell Product Delete Successfully!');

        return redirect()->back();
    }
    
    
    public function getProduct($id){
        $productId =  explode(',',$id);

        $outpot = '';
        
        foreach ($productId as $key => $value) {
            $s = Post::find($value);
            $outpot = $outpot.'<tr><input class="product-id" type="hidden" name="productId[]" value="'.$s->id.'">
                                <td width="5" ><input type="checkbox" class="checkbox-item"></td>
                                <td width="50" class="product-name-cell">'.$s->name.'</td>
                                <td width="2"> <input type="number" class="form-control" name="quantity[]"></td>
                                <td width="10" class="product-sellPr-cell">
								    <input name="selling_price[]" type="text" class="form-control">					
								</td>
                                </tr>';

        }
        return response()->json($outpot);

    }
    public function productSell(Request $request){
        $request->validate([
            'name'   => 'required',
            'productId' => 'required',
            'quantity' => 'required',
            'selling_price' => 'required',
        ]);
        try{
            $request->name;
            $request->phone;
            $request->address;
            $request->productId;
            $request->quantity;
            $request->selling_price;
            $s = '';
            foreach ($request->productId as $key => $productId) {
                $product = Post::find($productId);
                if($product->quantity >= $request->quantity[$key]){
                    
                }else{
                
                    $s = $s.$product->name.'(Available QTY '.$product->quantity.')'.'$';
                }
            }
            
            if($s){
                return back()->with('qError',$s);
            }

            foreach ($request->productId as $key => $productId) {
                
                $product = Post::find($productId);
                $product->name;
                $product->buing_price;
                $sells = new sell;
                $sells->productId = $productId;

                $sells->name =  $request->name;
                $sells->phone = $request->phone;
                $sells->address =  $request->address;

                $sells->productName =  $product->name;
                $sells->quantity =  $request->quantity[$key];
                $sells->sPrice =  $request->selling_price[$key];

                $sells->bPrice = $product->buing_price;
                if($sells->save()){
                    $product->decrement('quantity',$request->quantity[$key]);
                    $product->save();
                }
                setMessage('success','Product Sold!');
            }
        }catch(Exception $e){
            setMessage('danger',$e->getMessage());
        }
    return redirect()->back();
        
    }
    
}

<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\sell;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Post::get();
        $soldPro = sell::orderBy('id','DESC')->take(5)->get();
        $sells = sell::get();
        $totalBuying = 0;
        foreach ($products as $product) {
            $amount = $product->buing_price * $product->quantity;
            $totalBuying += $amount ;
        } //total product buying price
        $totalSelling = 0;
        foreach ($sells as $sell) {
            $amount = $sell->sPrice * $sell->quantity;
            $totalSelling += $amount ;
        } //total product selling price
        $totalLoss = 0;
        foreach ($sells as $sell) {
            if ($sell->sPrice < $sell->bPrice) {
                $amount = ($sell->bPrice * $sell->quantity)-($sell->sPrice * $sell->quantity);
                $totalLoss += $amount ;
            }else{
                $totalLoss =(0);
            }
        }
        $totalProfit = 0;
        foreach ($sells as $sell) {
            $amount = ($sell->sPrice * $sell->quantity)-($sell->bPrice * $sell->quantity);
            $totalProfit += $amount ;
        } //total Profit

        ////daily weekly monthly profit
        $date = Carbon::today();
        $todayProfit = sell::where('created_at','>=',$date)->get();

        return view('backend/dashboard',compact('soldPro','products','totalBuying','totalSelling','totalProfit','totalLoss','todayProfit'));

    }
}

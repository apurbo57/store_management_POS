<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','category_id','brand_id','model','buing_price','special_price','special_price_from','special_price_to','quantity','sku_code','color','size','warranty','warranty_duration','warranty_condition','description','status'];
    
    public function user(){
        return $this->belongsTo(User::class,'create_by');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}

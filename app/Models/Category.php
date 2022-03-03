<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','root','slug','status','create_by'];
    protected $with = ['subCategory','user'];

    public function user(){
        return $this->belongsTo(User::class,'create_by');
    }

    public function subCategory(){
        return $this->hasMany(Category::class,'root');
    }
}

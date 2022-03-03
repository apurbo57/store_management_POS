<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','status','create_by'];
    protected $with = 'user';

    public function user(){
        return $this->belongsTo(User::class,'create_by');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'category_name',
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}

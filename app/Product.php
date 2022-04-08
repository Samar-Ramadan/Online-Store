<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category1;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable =['name','file_path','date_expir','communicate','amount','price','user_id','category1_id'];

    public function category()
    {
         return $this->belongsTo(Category1::class);
    }
}

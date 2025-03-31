<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_images'; 
    public $timestamps = false;
    protected $fillable = ['product_id', 'product_image'];
    // const DELETED_AT = 'deleted_at';

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($orderItem) {
    //         $orderItem->created_at = Carbon::now(); 
    //     });

    //     static::updating(function ($orderItem) {
    //         $orderItem->updated_at = Carbon::now(); 
    //     });
    // }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
        // Định nghĩa cột cho xóa mềm
        protected $dates = ['deleted_at'];
     
}

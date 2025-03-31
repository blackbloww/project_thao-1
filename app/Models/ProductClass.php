<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Carbon\Carbon;




class ProductClass extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_class';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'product_code',
        'color_code',
        'color', 'size', 'price', 'cost', 'stock_quantity', 'note'
    ];
    // const DELETED_AT = 'deleted_at';

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($orderItem) {
    //         $orderItem->created_at = Carbon::now(); 
    //     });
    // }

    //     static::updating(function ($orderItem) {
    //         $orderItem->updated_at = Carbon::now(); 
    //     });
    // }
    // Quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
        // Định nghĩa cột cho xóa mềm
        protected $dates = ['deleted_at'];
}

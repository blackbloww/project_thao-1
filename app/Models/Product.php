<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product'; 
    protected $fillable = [
        'product_code',
        'product_name',
        'maker_id',
        'category_id',
        'note',
        'product_image'
    ];
    public $timestamps = false;
    
    const DELETED_AT = 'deleted_at';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderItem) {
            $orderItem->created_at = Carbon::now(); 
        });

        static::updating(function ($orderItem) {
            $orderItem->updated_at = Carbon::now(); 
        });
    }

    // Thêm quan hệ với ProductClass
    public function productClasses()
    {
        return $this->hasMany(ProductClass::class, 'product_id');
    }
    // Quan hệ với Maker
    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id', 'id');
    }
    // Quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id' ,'id');
    }
    //quan hệ với produt_img
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    // Định nghĩa cột cho xóa mềm
    protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Bắt buộc thêm

class Category extends Model
{
    use HasFactory , SoftDeletes;// Kích hoạt SoftDeletes
    protected $table = 'category'; 
    protected $fillable = ['category_name']; 
    public $timestamps = false;

    // Định nghĩa cột cho xóa mềm
    protected $dates = ['deleted_at']; 
}




<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Bắt buộc thêm

class Maker extends Model
{
    use HasFactory, SoftDeletes; // Kích hoạt SoftDeletes

    protected $table = 'maker'; 
    protected $fillable = ['maker_name', 'tel', 'email', 'note']; 
    public $timestamps = false;

    // Định nghĩa cột cho xóa mềm
    protected $dates = ['deleted_at']; 
}







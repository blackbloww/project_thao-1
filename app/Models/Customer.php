<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Authenticatable
{

    use HasFactory, SoftDeletes; // Thêm SoftDeletes vào đây

    // use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'username',
        'password',
        'email',
        'address',
        'created_at'
    ];

    public $timestamps = false;
    // Định nghĩa cột cho xóa mềm
    protected $dates = ['deleted_at']; // Thêm cột deleted_at vào đâyz
}

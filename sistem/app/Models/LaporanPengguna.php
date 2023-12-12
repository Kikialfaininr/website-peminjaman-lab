<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengguna extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $filled = ['*'];
    protected $primaryKey = 'id';
}
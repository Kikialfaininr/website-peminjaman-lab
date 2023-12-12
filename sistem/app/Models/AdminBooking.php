<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBooking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $filled = ['*'];
    protected $primaryKey = 'idbooking';
}

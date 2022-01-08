<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuissnesHours extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Doctor_id',
        'Day',
        'Open_time',
        'Close_time'
    ];
}

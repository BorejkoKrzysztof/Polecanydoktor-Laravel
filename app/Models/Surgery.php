<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Doctor_id',
        'Institution_name',
        'Street',
        'Building_number',
        'City',
        'Postal_code',
        'updated_at',
        'created_at'
    ];
}

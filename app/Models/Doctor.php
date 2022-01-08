<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'Id',
        'User_id',
        'Price_hour',
        'NFZ_collaborations',
        'Description',
        'Amount_ratings',
        'updated_at',
        'created_at'
    ];
}

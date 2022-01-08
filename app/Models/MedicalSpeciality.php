<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Doctor_id',
        'Medical_Speciality_id'
    ];
}

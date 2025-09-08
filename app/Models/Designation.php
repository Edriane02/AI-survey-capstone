<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    use HasFactory;
    protected $table = 'designations';
    protected $fillable = [
        'designation_name',
    ];

    public function facultyProfile()
    {
        return $this->hasMany(FacultyProfile::class, 'des_id', 'id');
    }

}

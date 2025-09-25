<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $table = 'programs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'program_name',
    ];

    public function studentProfiles()
    {
        return $this->hasMany(StudentProfile::class, 'program_id', 'id');
    }
}

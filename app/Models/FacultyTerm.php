<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FacultyTerm extends Model
{
      use HasFactory;

    protected $table = 'faculty_term';

    protected $fillable = [
        'faculty_profile_id',
        'term_id',
        'faculty_info',
        'position',
        'school',
        'rank',
        'attained_education',
        'home_units',
        'department',
        'faculty_load_path',
    ];

    public function facultyProfile()
    {
        return $this->belongsTo(FacultyProfile::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}

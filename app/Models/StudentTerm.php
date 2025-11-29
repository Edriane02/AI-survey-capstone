<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentTerm extends Model
{
    use HasFactory;

    protected $table = 'student_term';

    protected $fillable = [
        'student_id',
        'term_id',
        'year_level',
        'program',
        'home_units',
        'study_load_path',
    ];

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}

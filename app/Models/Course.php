<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_group',
        'course_code',
        'course_description',
        'course_units',
    ];

    public function students() {
        return $this->belongsToMany(StudentProfile::class, 'student_course');
    }

    public function faculty() {
        return $this->belongsToMany(FacultyProfile::class, 'faculty_course');
    }

    public function fullCourseInfo()
    {
        return "{$this->course_code} - {$this->course_description} ({$this->course_units} units)";
    }
}

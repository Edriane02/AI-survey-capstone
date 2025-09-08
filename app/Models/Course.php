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
        'user_id',
    ];

    public function facultyProfile()
    {
        return $this->belongsTo(FacultyProfile::class, 'user_id', 'user_id');
    }

    public function fullCourseInfo()
    {
        return "{$this->course_code} - {$this->course_description} ({$this->course_units} units)";
    }
   
    public function students()
    {
        return $this->belongsToMany(StudentProfile::class, 'course_student', 'course_id', 'user_id');
    }
}

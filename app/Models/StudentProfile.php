<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;
    // 
    protected $table = 'student_profile';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_id',
        'first_middle_name',
        'last_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studentTerm()
    {
        return $this->hasMany(StudentTerm::class, 'student_id');
    }


    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

     public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }

}

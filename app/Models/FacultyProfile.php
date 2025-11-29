<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyProfile extends Model
{
    //
    use HasFactory;
    protected $table = 'faculty_profile';
    protected $primaryKey = 'id';
    protected $fillable = [
        'faculty_id',
        'first_middle_name',
        'last_name',
        'avatar',
    ];

     public function user() {
        return $this->belongsTo(User::class);
    }

    public function facultyTerm()
    {
        return $this->hasMany(FacultyTerm::class, 'faculty_id');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_faculty');
    }

    public function evaluationsReceived() {
        return $this->hasMany(Evaluation::class, 'evaluatee_id');
    }

}

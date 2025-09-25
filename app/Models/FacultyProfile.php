<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use App\Models\Evaluation;

class FacultyProfile extends Model
{
    //
    use HasFactory;
    protected $table = 'faculty_profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'faculty_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'avatar',
        'role',
        'department',
    ];

     public function user() {
        return $this->belongsTo(User::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_faculty');
    }

    public function evaluationsGiven() {
        return $this->hasMany(Evaluation::class, 'evaluator_id');
    }

    public function evaluationsReceived() {
        return $this->hasMany(Evaluation::class, 'evaluatee_id');
    }

    public function fullName()
    {
        $middleInitial = $this->middle_name ? strtoupper($this->middle_name[0]) . '.' : '';

        return trim("{$this->title} {$this->first_name} {$middleInitial} {$this->last_name} {$this->suffix}");
    } 
}

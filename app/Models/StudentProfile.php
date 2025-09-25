<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;
    // 
    protected $table = 'student_profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'program_id',
        'year_level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

     public function courses() {
        return $this->belongsToMany(Course::class, 'student_course');
    }

    public function fullName()
    {
        $middleInitial = $this->middle_name ? strtoupper($this->middle_name[0]) . '.' : '';

        return trim("{$this->first_name} {$middleInitial} {$this->last_name} {$this->suffix}");
    }
}

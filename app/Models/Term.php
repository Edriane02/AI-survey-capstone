<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Term extends Model
{
      use HasFactory;

    protected $table = 'term';

    protected $fillable = [
        'term_name', 
        'start_date', 
        'end_date'
    ];

    public function studentTerm()
    {
        return $this->hasMany(StudentTerm::class);
    }

    public function facultyTerm()
    {
        return $this->hasMany(FacultyTerm::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'des_id',
        'department',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'des_id', 'id');
    }

    public function fullName()
    {
        $middleInitial = $this->middle_name ? strtoupper($this->middle_name[0]) . '.' : '';

        return trim("{$this->title} {$this->first_name} {$middleInitial} {$this->last_name} {$this->suffix}");
    } 
}

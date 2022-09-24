<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','first_name', 'last_name', 'student_number', 'classroom', 'grade', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

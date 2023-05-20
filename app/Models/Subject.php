<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pass_mark',
        'status',
        'source',
        'assignment',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function studentMark()
    {
        return $this->belongsToMany(User::class, 'subject_student', 'subject_id', 'student_id')
            ->withPivot(['mark', 'assignment'])
            ->withTimestamps();
    }

    public function teacherSubject()
    {
        return $this->belongsToMany(User::class, 'subject_teacher', 'subject_id', 'teacher_id')
            ->withTimestamps();
    }

    public function studentSubject()
    {
        return $this->belongsToMany(User::class, 'subject_student', 'subject_id', 'student_id')
            ->withPivot(['mark', 'assignment'])
            ->withTimestamps();
    }
}

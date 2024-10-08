<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'dob',
        'class',
        'status',
        'qualifications',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => 'boolean',
    ];

    public function getNameAttribute()
    {
        return ($this->first_name . ' ' . $this->last_name);
    }

    public function scopeIsAdmin()
    {
        return $this->roles->contains('id', Role::ROLE_ADMIN);
    }

    public function scopeIsStudent()
    {
        return $this->roles->contains('id', Role::ROLE_STUDENT);
    }

    public function scopeIsTeacher()
    {
        return $this->roles->contains('id', Role::ROLE_TEACHER);
    }

    public function roleUser()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'role_id', 'model_id')
            ->withTimestamps();
    }

    public function teacherSubject()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'teacher_id', 'subject_id')
            ->withTimestamps();
    }

    public function studentSubject()
    {
        return $this->belongsToMany(Subject::class, 'subject_student', 'student_id', 'subject_id')
            ->withPivot(['mark', 'assignment'])
            ->withTimestamps();
    }

    public function userClass()
    {
        return $this->hasOne(Lov::class, 'id', 'class');
    }
}

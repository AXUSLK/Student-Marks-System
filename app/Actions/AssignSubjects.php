<?php

namespace App\Actions;

use App\Models\Role;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjects
{
    use AsAction;

    public function handle(User $user, $role, $subjects)
    {
        $attach_student_subjects = null;
        $attach_teacher_subjects = null;
        $user->assignRole((int)$role);

        if ($role == Role::ROLE_STUDENT) {
            $attach_student_subjects = $user->studentSubject()->sync($subjects);
        }
        if ($role == Role::ROLE_TEACHER) {
            $attach_teacher_subjects = $user->teacherSubject()->sync($subjects);
        }

        if ($attach_student_subjects && $attach_teacher_subjects) {
            return true;
        } else {
            return false;
        }
    }
}

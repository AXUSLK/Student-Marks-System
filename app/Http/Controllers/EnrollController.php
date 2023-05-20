<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class EnrollController extends Controller
{


    /**
     * Get assing the specified resource to this.
     */
    public function getAssignSubjects(User $student)
    {
        $subjects = Subject::active()->get();
        $studentSubjects = DB::table("subject_student")->where("subject_student.student_id", $student->id)
            ->pluck('subject_student.subject_id', 'subject_student.subject_id')
            ->all();
        return view('students.partials.assign', compact('student', 'subjects', 'studentSubjects'));
    }

    /**
     * Assing the specified resource to this.
     */
    public function postAssignSubjects(Request $request, User $student)
    {
        $this->validate($request, [
            'subjects' => 'required',
        ]);

        $attach_student_subjects = $student->studentSubject()->sync($request->subjects);
        if ($attach_student_subjects) {
            $student_subjects = $student->studentSubject;
        }
        return redirect()->route('students.show', compact('student', 'student_subjects'));
    }
}

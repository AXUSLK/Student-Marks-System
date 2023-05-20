<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class MarkController extends Controller
{

    /**
     * Get assing the specified resource to this.
     */
    public function getAddMarks(Request $request, $subject, $user)
    {
        $student = User::find($user);
        $subject = Subject::find($subject);
        $subjectMark = DB::table("subject_student")
            ->where("subject_student.student_id", $student->id)
            ->where("subject_student.subject_id", $subject->id)
            ->first();
        return view('subjects.partials.mark', compact('subject', 'student', 'subjectMark'));
    }

    /**
     * Assing the specified resource to this.
     */
    public function postAddMarks(Request $request, $subject, $user)
    {
        $this->validate($request, [
            'mark' => 'required',
        ]);
        $user = User::find($user);
        $subject = Subject::find($subject);
        $subjectMark = DB::table("subject_student")
            ->where("subject_student.student_id", $user->id)
            ->where("subject_student.subject_id", $subject->id)
            ->update(['subject_student.mark' => $request->mark]);
        $student_marks = $user->studentMark;
        if ($subjectMark) {
            return redirect()->route('subjects.show', compact('subject', 'student_marks'));
        } else {
            abort('404');
        }
    }
}

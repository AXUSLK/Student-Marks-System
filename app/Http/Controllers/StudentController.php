<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Lov;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->IsAdmin()) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('roles.id', Role::ROLE_STUDENT);
            })->get();
        } elseif ($user->IsTeacher()) {
            $ids = $user->teacherSubject->pluck('id');
            $students = User::whereHas('studentSubject', function ($query) use ($ids) {
                $query->whereIn('subject_id', $ids);
            })->whereHas('roles', function ($query) {
                $query->where('roles.id', Role::ROLE_STUDENT);
            })->get();
        }

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = User::with('studentSubject')->find($id);
        $student_subjects = $student->studentSubject;
        return view('students.show', compact('student', 'student_subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = User::find($id);
        User::where('id', $student->user_id)->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}

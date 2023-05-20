<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\User;
use App\Services\FileUploderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->IsAdmin()) {
                $subjects = Subject::all();
            } elseif ($user->IsTeacher()) {
                $ids = $user->teacherSubject->pluck('id');
                $subjects = Subject::active()
                    ->whereHas('teacherSubject', function ($query) use ($ids) {
                        $query->whereIn('subject_id', $ids);
                    })
                    ->get();
            } elseif ($user->IsStudent()) {
                $ids = $user->studentSubject->pluck('id');
                $subjects = Subject::active()
                    ->whereHas('studentSubject', function ($query) use ($ids) {
                        $query->whereIn('subject_id', $ids);
                    })
                    ->get();
            }
        } else {
            $subjects = Subject::active()->get();
        }
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        if ($request->assignment) {
            $assignmentFileName = (new FileUploderService())
                ->uploadStorageFile(
                    $request->assignment,
                    'subjects',
                    'assignments',
                );
        }
        if ($request->source) {
            $sourceFileName = (new FileUploderService())
                ->uploadStorageFile(
                    $request->source,
                    'subjects',
                    'sources',
                );
        }

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->pass_mark = $request->mark;
        $subject->assignment = $assignmentFileName;
        $subject->source = $sourceFileName;
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        $student_marks = $subject->studentMark;
        if (Auth::user()->IsStudent()) {
            $student = User::where('id', Auth::user()->id)->first();
            $subjectMark = DB::table("subject_student")
                ->where("subject_student.student_id", $student->id)
                ->where("subject_student.subject_id", $id)
                ->first();
        } else {
            $subjectMark = null;
        }
        return view('subjects.show', compact('subject', 'student_marks', 'subjectMark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, $id)
    {
        if ($request->assignment) {
            $assignmentFileName = (new FileUploderService())
                ->uploadStorageFile(
                    $request->assignment,
                    'subjects',
                    'assignments',
                );
        }
        if ($request->source) {
            $sourceFileName = (new FileUploderService())
                ->uploadStorageFile(
                    $request->source,
                    'subjects',
                    'sources',
                );
        }

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->pass_mark = $request->mark;
        if ($request->source) {
            $subject->assignment = $assignmentFileName;
        }
        if ($request->source) {
            $subject->source = $request->source ?? $sourceFileName;
        }
        $subject->status = $request->status == null ? false : true;
        $subject->updated_by = Auth::user()->id;
        $subject->update();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
}

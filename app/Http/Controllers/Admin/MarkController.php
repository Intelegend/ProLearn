<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Lesson;
use App\Mark;
use App\TestsResult;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMarkRequest;
use App\Http\Requests\Admin\UpdateMarkRequest;

class MarkController extends Controller
{
    
    /**
     * Display a listing of Mark.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! Gate::allows('lesson_access')) {
            return abort(401);
        }

        $marks = Mark::whereIn('course', Course::ofTeacher()->pluck('id'));
        $marks = Mark::whereIn('lessons', Lesson::get()->pluck('id'));
        $marks = Mark::whereIn('tests', Test::get()->pluck('title','id'));
        $marks = Mark::whereIn('students', User::get()->pluck('title','id'));
        $marks = Mark::whereIn('tests_result', TestsResult::get()->pluck('test_result','id'));

        if ($request->input('lessons')) {
            $marks = $marks->where('lessons', $request->input('lessons'));
            $marks = $marks->where('lessons', $request->input('lessons'));

        }
        if ($request->input('course')) {
            $marks = $marks->where('course', $request->input('course'));
            $marks = $marks->where('course', $request->input('course'));

        }
        if ($request->input('tests')) {
            $marks = $marks->where('tests', $request->input('tests'));
            $marks = $marks->where('tests', $request->input('tests'));

        }
        if ($request->input('students')) {
            $marks = $marks->where('student_id', $request->input('student_id'));
            $marks = $marks->where('student_id', $request->input('student_id'));

        }
        if ($request->input('tests_result')) {
            $marks = $marks->where('tests_result', $request->input('tests_result'));
            $marks = $marks->where('tests_result', $request->input('tests_result'));

        }
        if (request('show_deleted') == 1) {
            if (! Gate::allows('lesson_delete')) {
                return abort(401);
            }
            $marks = Mark::onlyTrashed()->get();
        } else {
            $marks = Mark::get();
        }

        return view('admin.mark.index', compact('marks'));
    }

    /**
     * Show the form for creating new Lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('lesson_access')) {
            return abort(401);
        }
        $courses = \App\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id');
        $lessons = \App\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id');
        $tests = \App\Test::get()->pluck('title', 'id');
        $tests1 = \App\Test::get();
        $student = \App\User::whereHas('role', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');
        $tests_ids = $tests1->pluck('id');
        $tests_result = \App\TestsResult::whereIn('test_id', $tests_ids)->get()->pluck('test_result', 'id');
        $mark = array_collapse([[1, 2, 3], [4, 5]]);
        return view('admin.mark.create', compact('courses','lessons','tests','student','tests_result','mark'));
    }
    /**
     * Show the form for editing Marks.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('lesson_edit')) {
            return abort(401);
        }
        $mark_id = Mark::findOrFail($id);
        $courses = \App\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id');
        $lessons = \App\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id');
        $tests = \App\Test::get()->pluck('title', 'id');
        $tests1 = \App\Test::get();
        $student = \App\User::whereHas('role', function ($q) { $q->where('role_id', 3); } )->get()->pluck('name', 'id');
        $tests_ids = $tests1->pluck('id');
        $tests_result = \App\TestsResult::whereIn('test_id', $tests_ids)->get()->pluck('test_result', 'id');
        $mark = array_collapse([[1, 2, 3], [4, 5]]);
        return view('admin.mark.edit', compact('courses','lessons','tests','student','tests_result','mark','mark_id'));
    }

    /**
     * Update Lesson in storage.
     *
     * @param  \App\Http\Requests\UpdateMarkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkRequest $request, $id)
    {
        if (! Gate::allows('lesson_edit')) {
            return abort(401);
        }

        $mark = Mark::findOrFail($id);
        $mark->update($request->all());

        return redirect()->route('admin.mark.index', ['mark_id' => $request->mark_id]);
    }


    /**
     * Display Mark.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('lesson_view')) {
            return abort(401);
        }
        $courses = \App\Course::get()->pluck('title', 'id')->prepend('Пожалуйста выберите', '');
        
        
        $tests = \App\Test::where('lesson_id', $id)->get();

        $mark = Mark::findOrFail($id);

        return view('admin.mark.show', compact( 'mark'));
    }


    /**
     * Remove Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('lesson_delete')) {
            return abort(401);
        }
        $mark = Mark::findOrFail($id);
        $mark->delete();

        return redirect()->route('admin.mark.index');
    }

    /**
     * Delete all selected Mark at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('lessons_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Mark::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('lesson_delete')) {
            return abort(401);
        }
        $mark = Mark::onlyTrashed()->findOrFail($id);
        $mark->restore();

        return redirect()->route('admin.mark.index');
    }

     /**
     * Store a newly created Test in storage.
     *
     * @param  \App\Http\Requests\StoreMarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkRequest $request)
    {
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        
        //dd($request->toArray());
        $mark = Mark::create($request->all());
        

        return redirect()->route('admin.mark.index');
    }
    /**
     * Permanently delete Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('test_delete')) {
            return abort(401);
        }
        $mark = Mark::onlyTrashed()->findOrFail($id);
        $mark->forceDelete();

        return redirect()->route('admin.mark.index');
    }
}

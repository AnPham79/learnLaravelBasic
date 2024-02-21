<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    private string $title = 'Quản lí khóa học';

    public function __construct()
    {
        View::share('title', $this->title);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('q');

        $data = Course::query()
        ->where('name', 'like' , '%' . $search . '%')
        ->paginate(3);

        $data->appends(['q' => $search]);

        return view('khoahocView.index', 
        [   
            'data' => $data, 
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khoahocView.create');
    }

    public function store(StoreRequest $request)
    {
        $obj = new Course();
        $obj->fill($request->except('_token'));
        $obj->save();

        return redirect()->route('courses.index');
    }

    public function show(Course $courses)
    {
        //
    }

    public function edit(Course $courses)
    {
        return view('khoahocView.edit', [
            'courses' => $courses
        ]);
    }

    public function update(Request $request, Course $courses)
    {
        Course::where('id', $courses->id)->update(
            $request->except('_token', '_method')
        );

        return redirect()->route('courses.index');
    }

    public function destroy(Course $courses)
    {
        $courses->delete();

        return redirect()->route('courses.index');
        // Course::destroy($course);
        // Course::where('id', $course)->delete();
        // dd($course);
    }
}

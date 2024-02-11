<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $student = Student::all();

        return view('sinhvienView.index', [
            'student' => $student
        ]);
    }

    public function create() {
        return view('sinhvienView.create');
    }

    public function store(Request $request) {
        // dd($request->get('hosinhvien'));
        // dd($request->except('_token'));
        $student = new Student();
        // $student->hosinhvien = $request->get('hosinhvien');
        // $student->tensinhvien = $request->get('tensinhvien');
        // $student->ngaysinh = $request->get('ngaysinh');
        // $student->gioitinh = $request->get('gioitinh');
        $student->fill($request->except('_token'));
        $student->save();

        return redirect()->route('student.index');
    }

    public function destroy(Student $student) {
        $student->delete();

        return redirect()->route('student.index');
        // Student::destroy($student);
        // Student::where('id', $student)->delete();
    }
}

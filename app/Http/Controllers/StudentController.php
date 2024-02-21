<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('q');

        $student = Student::query()
            ->where('tensinhvien', 'like', '%' . $search . '%')
            ->paginate();
        $student->appends(['q' => $search]); // thêm vào link nếu như có thao tác khác, như trong lúc tìm kiếm
        // thì thêm phân trang vào

        return view('sinhvienView.index', [
            'search' => $search,
            'student' => $student
        ]);
    }

    public function create() {
        return view('sinhvienView.create');
    }

    public function store(StoreRequest $request) {
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

    public function edit($id) {
        $student = Student::find($id);
        return view('sinhvienView.edit', ['student' => $student]);
    }    

    public function update(Request $request, Student $student) {
        Student::where('id', $student->id)->update($request->except(['_token', '_method']));
        return redirect()->route('student.index');
    }
}

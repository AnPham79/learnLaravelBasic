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
}

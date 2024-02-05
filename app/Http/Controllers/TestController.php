<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function form() {
        return view('form');
    }

    public function post(Request $request) {
        $value = $request->get('value');

        return view('show', ['value' => $value]);
    }
}

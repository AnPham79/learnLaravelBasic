<?php

namespace App\Http\Controllers;

use App\Models\sinhvien;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoresinhvienRequest;
use App\Http\Requests\UpdatesinhvienRequest;
use App\Enums\trangthaisinhvienEnum;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = sinhvien::all();
        
        return view('SinhvienNew.index',
        [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $course = Course::query()->get();

        $arrtrangthaisinhvien = trangthaisinhvienEnum::asArray();

        // dd($arrtrangthaisinhvien);

        return view('SinhvienNew.create', [
            'course' => $course,
            'arrtrangthaisinhvien' => $arrtrangthaisinhvien
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresinhvienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresinhvienRequest $request)
    {
        $obj = new sinhvien;
        $obj->fill($request->except('_token'));
        $obj->save();

        // dd($obj->fill($request->except('_token')));

        return redirect()->route('sinhvien.index')->with('success', 'Tuyệt, bạn đã thêm thành công sinh viên !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sinhvien  $sinhvien
     * @return \Illuminate\Http\Response
     */
    public function show(sinhvien $sinhvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sinhvien  $sinhvien
     * @return \Illuminate\Http\Response
     */
    public function edit(sinhvien $sinhvien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesinhvienRequest  $request
     * @param  \App\Models\sinhvien  $sinhvien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesinhvienRequest $request, sinhvien $sinhvien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sinhvien  $sinhvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(sinhvien $sinhvien)
    {
        //
    }
}

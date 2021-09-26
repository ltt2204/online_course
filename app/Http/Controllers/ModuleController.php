<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules'] = Module::with('subject')->get();
        $data['subjects'] = Subject::all();
        return view('admin.module.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'name' => 'required',
        ], [
            'subject_id.required' => 'Bạn phải chọn môn học',
            'name.required' => 'Bạn phải nhập tên bài học',
        ]);
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }
        
        $module = new Module;

        $module->subject_id = $request->subject_id;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->status = $request->status;
        $module->save();
        return redirect()->back()->with('success', 'Thêm bài học thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['subjects'] = Subject::all();
        $data['module'] = Module::where('id', $id)->first();
        return view('admin.module.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::where('id', $id)->first();
        $module->subject_id = $request->subject_id;
        $module->name = $request->name;
        $module->description = $request->description;
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }
        $module->status = $request->status;
        $module->update();
        return redirect()->route('module.index')->with('success', 'Sửa học phần thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::find($id)->delete();
        return redirect()->route('module.index')->with('success', 'Xoá học phần thành công');
    }
}

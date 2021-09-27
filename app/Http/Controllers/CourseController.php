<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['courses'] = Course::with('subject')->get();
        return view('teacher.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        return view('teacher.course.create', $data);
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
            'key' => 'required',
        ], [
            'subject_id.required' => 'Bạn phải chọn môn học',
            'name.required' => 'Bạn phải nhập tên lớp',
            'key.required' => 'Bạn phải nhập mã lớp',
        ]);
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }

        $course = new Course;
        $course->subject_id = $request->subject_id;
        $course->user_id    = Auth::user()->id;
        $course->name       = $request->name;
        $course->key        = $request->key;
        $course->content    = $request->content;
        $course->start_date = $request->start_date;
        $course->end_date   = $request->end_date;
        $course->status     = $request->status;
        if ($request->file != null) {
            $newImageName = time() . '-' . randomPassword() . '.' . $request->file->extension();
            $up_location = 'images/course/file/';
            $request->file->move($up_location, $newImageName);
            $course->file = $up_location . $newImageName;
        } else {
            $course->file = null;
        }
        if ($request->avatar != null) {
            $newImageName = time() . '-' . randomPassword() . '.' . $request->avatar->extension();
            $up_location = 'images/course/avatar/';
            $request->avatar->move($up_location, $newImageName);
            $course->avatar = $up_location . $newImageName;
        } else {
            $course->avatar = null;
        }

        $course->save();

        if ($request->btnSave) {
            return redirect()->route('course.create')->with('success', 'Thêm lớp học thành công');
        } else {
            return redirect()->route('course.index')->with('success', 'Thêm lớp học thành công');
        }
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
        $data['course'] = Course::where('id', $id)->first();
        return view('teacher.course.edit', $data);
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
        $course = Course::where('id', $id)->first();
        $course->subject_id = $request->subject_id;
        $course->user_id    = Auth::user()->id;
        $course->name       = $request->name;
        $course->key        = $request->key;
        $course->content    = $request->content;
        $course->start_date = $request->start_date;
        $course->end_date   = $request->end_date;
        if ($request->file != null) {
            if ($course->file != null) {
                File::delete($course->file);
            }  
            $newImageName = time() . '-' . randomPassword() . '.' . $request->file->extension();
            $up_location = 'images/course/file/';
            $request->file->move($up_location, $newImageName);
            $course->file = $up_location . $newImageName;
        }
        if ($request->avatar != null) {
            if ($course->avatar != null) {
                File::delete($course->avatar);
            }  
            $newImageName = time() . '-' . randomPassword() . '.' . $request->avatar->extension();
            $up_location = 'images/course/file/';
            $request->avatar->move($up_location, $newImageName);
            $course->avatar = $up_location . $newImageName;
        }
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }
        $course->status = $request->status;
        $course->update();
        return redirect()->route('course.index')->with('success', 'Sửa lớp học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course->file != null) {
            File::delete($course->file);
        }
        if ($course->avatar != null) {
            File::delete($course->avatar);
        }
        $course->delete();
        return redirect()->back()->with('success', 'Xoá lớp học thành công');
    }

    /**
     * 
     */
    public function changeStatus($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        $data['status'] = ($course->status == 'on') ? 'off' : 'on';
        DB::table('courses')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Thay đổi trình trạng thành công');
    }
}

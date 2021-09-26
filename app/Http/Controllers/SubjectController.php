<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = Subject::all();
        return view('admin.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
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
            'code' => 'required',
            'name' => 'required',
        ], [
            'code.required' => 'Bạn phải nhập mã môn học',
            'name.required' => 'Bạn phải nhập tên môn học',
        ]);
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }
        
        $subject = new Subject;

        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->description = $request->description;
        if ($request->outline != null) {
            $newImageName = time() . '-' . randomPassword() . '.' . $request->outline->extension();
            $up_location = 'images/subject/';
            $request->outline->move($up_location, $newImageName);
            $subject->outline = $up_location . $newImageName;
        } else {
            $subject->outline = null;
        }
        if ($request->image != null) {
            $newImageName = time() . '-' . randomPassword() . '.' . $request->image->extension();
            $up_location = 'images/subject/';
            $request->image->move($up_location, $newImageName);
            $subject->image = $up_location . $newImageName;
        } else {
            $subject->image = null;
        }
        $subject->status = $request->status;
        $subject->save();
        if ($request->btnSave) {
            return redirect()->route('subject.create')->with('success', 'Thêm môn học thành công');
        } else {
            return redirect()->route('subject.index')->with('success', 'Thêm môn học thành công');
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
        $data['subject'] = Subject::find($id);
        return view('admin.subject.edit', $data);
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
        $subject = Subject::where('id', $id)->first();
        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->description = $request->description;
        if ($request->outline != null) {
            if ($subject->outline != null) {
                File::delete($subject->outline);
            }    
            $newImageName = time() . '-' . randomPassword() . '.' . $request->outline->extension();
            $up_location = 'images/subject/';
            $request->outline->move($up_location, $newImageName);
            $subject->outline = $up_location . $newImageName;
        } 
        if ($request->image != null) {
            if ($subject->image != null) {
                File::delete($subject->image);
            }    
            $newImageName = time() . '-' . randomPassword() . '.' . $request->image->extension();
            $up_location = 'images/subject/';
            $request->image->move($up_location, $newImageName);
            $subject->image = $up_location . $newImageName;
        } 
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }
        $subject->status = $request->status;
        $subject->update();
        return redirect()->route('subject.index')->with('success', 'Sửa môn học thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        if ($subject->outline != null) {
            File::delete($subject->outline);
        }
        if ($subject->image != null) {
            File::delete($subject->image);
        }
        $subject->delete();
        return redirect()->back()->with('success', 'Xoá môn học thành công');
    }

    /**
     * 
     */
    public function changeStatus($id)
    {
        $subject = DB::table('subjects')->where('id', $id)->first();
        $data['status'] = ($subject->status == 'on') ? 'off' : 'on';
        DB::table('subjects')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Thay đổi trình trạng thành công');
    }
}

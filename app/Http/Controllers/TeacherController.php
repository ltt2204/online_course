<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * 
     */
    public function info()
    {
        return view('teacher.info');
    }

    /**
     * 
     */
    public function storeInfo(Request $request)
    {
        $data['last_name']    = $request->last_name;
        $data['first_name']   = $request->first_name;
        $data['id_code']      = $request->id_code;
        $data['phone_number'] = $request->phone_number;
        $data['address']      = $request->address;
        $data['info']         = $request->info;
        $data['updated_at']   = Carbon::now();

        DB::table('users')->where('id', Auth::user()->id)->update($data);

        return redirect()->route('teacher.info')->with('success', 'Thay đổi thông tin thành viên thành công');
    }

    /**
     * 
     */
    public function storeAvatar(Request $request)
    {
        if (Auth::user()->image != null) {
            File::delete(Auth::user()->image);
        }
        $newImageName = time() . '-' . randomPassword() . '.' . $request->image->extension();
        $up_location = 'images/avatar/';
        $request->image->move($up_location, $newImageName);
        $data['image'] = $up_location . $newImageName;
        DB::table('users')->where('id', Auth::user()->id)->update($data);

        return redirect()->route('teacher.info')->with('success', 'Thay đổi thành công ảnh đại diện của thành viên.');
    }

    /**
     * 
     */
    public function storePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ], [
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
            'password.confirmed' => 'Mật khẩu không giống nhau',
        ]);
        
        $data['password'] = Hash::make($request->password);
        DB::table('users')->where('id', Auth::user()->id)->update($data);
        
        return redirect()->route('teacher.info')->with('success', 'Mật khẩu của bạn đã thay đổi thành công.');
    }

    
}

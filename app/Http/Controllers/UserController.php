<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'last_name' => 'required',
            'first_name' => 'required',
            'role' => 'required',
        ], [
            'email.required' => 'Bạn phải nhập địa chỉ email',
            'email.unique' => 'Địa chỉ email đã tồn tại rồi',
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
            'last_name.required' => 'Bạn phải nhập họ và tên lót',
            'first_name.required' => 'Bạn phải nhập tên',
            'role.required' => 'Bạn phải chọn vai trò',
        ]);
        if ($request->status != 'on') {
            $request['status'] = 'off';
        }

        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('user.index')->with('success', 'Đã thêm thành công một thành viên mới.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->image != null) {
            File::delete($user->image);
        }
        
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Xoá thành công một thành viên.');
    }

    /**
     * 
     */
    public function info()
    {
        return view('admin.info');
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

        return redirect()->route('user.info')->with('success', 'Thay đổi thông tin thành viên thành công');
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

        return redirect()->route('user.info')->with('success', 'Thay đổi thành công ảnh đại diện của thành viên.');
    }

    /**
     * 
     */
    public function storePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|confirmed|min:6',
        ], [
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
            'password.confirmed' => 'Mật khẩu không giống nhau',
        ]);
        
        $data['password'] = Hash::make($request->password);
        DB::table('users')->where('id', Auth::user()->id)->update($data);
        
        return redirect()->route('user.info')->with('success', 'Mật khẩu của bạn đã thay đổi thành công.');
    }

    /**
     * 
     */
    public function changeStatus($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $data['status'] = ($user->status == 'on') ? 'off' : 'on';
        DB::table('users')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Thay đổi thành công trình trạng của thành viên.');
    }
}

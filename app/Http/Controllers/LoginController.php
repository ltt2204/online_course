<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * View Login Form
     */
    public function getLogin()
    {
        return view('login.login');
    }

    /**
     * Check for Login Information
     */
    public function postLogin(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn phải nhập địa chỉ email',
            'email.email' => 'Hình như không phải là một email',
            'password.required' => 'Bạn phải nhập mật khẩu',
        ]);

        if (Auth::attempt($input)) {
            $user = Auth::user();
            if ($user->status != 'on') {
                return redirect()->route('login')
                    ->with('error', 'Tài khoản của bạn không hoạt động. Hãy liên hệ với người quản lý của bạn.');
            }
            switch ($user->role) {
                case LOGIN_ADMIN:
                    return redirect()->route('admin-home');
                case LOGIN_TEACHER:
                    return redirect()->route('teacher-home');
                case LOGIN_STUDENT:
                    return redirect()->route('student-home');
                default:
                    return redirect()->route('login')
                        ->with('error', 'Bạn chưa có quyền đăng nhập. Hãy liên hệ với người quản lý của bạn.');
            }
        } else {
            return redirect()->route('login')
                             ->with('error', 'Nhập sai email/mật khẩu. Vui lòng nhập lại.');
        }
    }

    /**
     * For Logout
     */
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * View Admin Home Page
     */
    public function viewAdminHomePage()
    {
        return view('admin.home');
    }

    /**
     * View Teacher Home Page
     */
    public function viewTeacherHomePage()
    {
        return view('teacher.home');
    }

    /**
     * View Student Home Page
     */
    public function viewStudentHomePage()
    {
        return view('student.home');
    }
}

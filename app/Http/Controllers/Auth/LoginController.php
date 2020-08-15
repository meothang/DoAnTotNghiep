<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest; 
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
     public function login(Request $request)
    {
        $this -> validate($request, [
       'name' => 'required|min:6',
       'password' => 'required|min:6|max:32',
     ],
     [
       'password.required' => 'Vui lòng nhập mật khẩu',
       'name.required' => 'Vui lòng nhập tên của bạn.'
     ]);
     $data = $request -> only('name', 'password');
     if (Auth::attempt($data) ){
      return redirect()->route('admin.home')-> with(['flash_level' => 'success', 'flash_message' => 'Đăng nhập thành công.']);;
    }
    else{
      return redirect() -> back()->with(['thongbao' => 'Tài Khoản Bạn Không Đúng!']);
    }
    }

     public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('admin.get.login');
    }

   
}

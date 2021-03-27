<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class loginController extends Controller
{
   public function index()
   {

      if(Auth::check()){
         return redirect()->route('dashboard');
      }
      return view('admin.auth.login');
   }
   public function login(Request $request)
   {
      $user = $request->only('email', 'password');
      if (Auth::attempt($user)) {
         Flash::info('Đăng nhập thành công.');
         return redirect()->route('dashboard');
      } else {

         Flash::error('Tên đăng nhập hoặc mật khẩu không chính xác.');
         return redirect()->back();
      }
   }
   
   public function getLogout()
   {
       Auth::logout();
       Flash::info('Đăng xuất thành công.');
       return redirect()->route('login');
   }
   public function register()
   {
      return view('admin.auth.register');
   }
}

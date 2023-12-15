<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RecoverRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('Main.login');
    }

    public function postLogin(LoginRequest $request){

        $remember = false;
        if($request->remember == "remember"){
            $remember = true;
        }
        $loginValue = ['email' => $request->email, 'password' => $request->password];

        if(Auth::attempt($loginValue, $remember)){
            return redirect('/admin/home');
        }
        else{
            return back()->withInput()->with('error', "Tài Khoản Hoặc Mật Khẩu Không Đúng!!!");
        }

    }

    public function postRecover(RecoverRequest $request){
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->newPassword);
        $user->save();
        return redirect()->back()->with(['recover_success' => 'Thay Đổi Mật Khẩu Mới Thành Công!!!']);
    }
}

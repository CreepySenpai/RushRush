<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser(){
        $data['userList'] = User::all();
        $data['userRoleList'] = Role::all();
        return view('Admin.user', $data);
    }

    public function getEditUser($user_id){
        $data['user'] = User::find($user_id);
        $data['roleList'] = Role::all();
        return view('Admin.edituser', $data);
    }

    public function getDeleteUser($user_id){
        if($user_id == UserType::ADMIN){
            return redirect()->back()->with(['delete_user_error' => 'Không Thể Xoá Người Dùng Này!!!']);
        }
        else{
            User::destroy($user_id);
            return redirect()->back()->with(['delete_user_success' => 'Xoá Người Dùng Thành Công!!!']);
        }
    }

    public function getAddUser(){
        $data['roleList'] = Role::all();
        return view("Admin.adduser", $data);
    }

    public function postEditUser(Request $request, $user_id){
        $user = User::find($user_id);
        $user->user_name = $request->user_name;
        $user->email = $request->user_email;

        // only admin can change role
        if(Auth::user()->role_type == UserType::ADMIN){
            $user->role_type = $request->user_role;
        }
        $user->save();
        return redirect('admin/user')->with(['edit_user_success' => 'Thay Đổi Thông Tin Người Dùng Thành Công!!!']);
    }

    public function postAddUser(AddUserRequest $request){
        $user = new User();

    }
}

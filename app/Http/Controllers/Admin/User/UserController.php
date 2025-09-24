<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('created_at','desc')->paginate(15);
        return  view('admin.user.index',compact('users'));
    }
    public function status(User $user){
        $user->role = $user->role == 1?0:1;
        $user->save();
        return redirect()->route('admin.user.index')->with('alert-success','تغییر نقش با موفقیت انجام شد');  
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('alert-success','کاربر با موفقیت حذف شد');
    }
}

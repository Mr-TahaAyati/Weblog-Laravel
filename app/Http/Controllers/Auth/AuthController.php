<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Mail\ConfirmMail;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function forgetPassword()
    {
        return view('auth.forgetpassword');
    }



   public function registerSubmit(UserRegisterRequest $request)
{
    $data = $request->all();
    $data['password'] = Hash::make($request->password);

    // کاربر را ایجاد می‌کنیم و مدل آن را می‌گیریم
    $user = User::create($data);

$title = 'خوش آمدید '.''. $user->name;
    $body = 'ایمیل شما با موفقیت در سایت ما ثبت شد';

    // ارسال ایمیل به کاربر با استفاده از مدل کاربر
    Mail::to($user->email)->send(new ConfirmMail($title, $body, $user));

    return redirect()->route('auth.login');
}

    public function forgetSubmit() {}
    public function loginSubmit(UserLoginRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($user->role === 1) {
                return redirect()->route('admin.home');
            }
            return redirect()->route('blog');
        }
        return redirect()->back()->with('alert-error', 'حساب کاربری یافت نداشت لطفا ابتدا ثبت نام کنید');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('blog');
    }

    public function profile()
    {
        $posts = Post::orderBy('created_at', 'desc');
        return view('profile.profile', compact('posts'), ['user' => auth()->user()]);
    }
}

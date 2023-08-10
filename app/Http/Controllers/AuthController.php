<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view()
    {
        if (Auth::check())
            return redirect(route('index'));

        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $validate_data = $request->validated();
        if (Auth::attempt(['email' => $validate_data['email'],'password' => $validate_data['password']])){
            return redirect(route('index'));
        }

        $this->show_message('چنین مشخصاتی در سیستم وجود ندارد');
        return redirect()->back();
    }

    public function register_view()
    {
        if (Auth::check())
            return redirect(route('index'));

        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $validate_data = $request->validated();
        $validate_data['password'] = Hash::make($validate_data['password']);
        $user = User::query()->create($validate_data);

        Auth::loginUsingId($user->id);

        $this->show_message('با موفقیت ثبت نام شدید');
        return redirect(route('index'));
    }
}

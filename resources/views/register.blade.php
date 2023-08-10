@extends('layouts.app')

@section('content')
    <form action="{{ route('register.post') }}" method="post" class="px-64 text-right mt-24">
        @csrf
        @method('post')
        <x-form.input type="text" name="username" label="نام کاربری خود را وارد کنید" placeholder="ali053.."></x-form.input>
        <x-form.input type="email" name="email" label="ایمیل خود را وارد کنید" placeholder="example@domain.com"></x-form.input>
        <x-form.input type="password" name="password" label="رمز عبور خود را وارد کنید" placeholder="example@domain.com"></x-form.input>
        <x-button color="blue">ثبت نام</x-button>
    </form>
@endsection


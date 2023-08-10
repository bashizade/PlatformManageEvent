@extends('layouts.app')

@section('content')
    <form action="{{ route('login.post') }}" method="post" class="px-64 text-right mt-24">
        @csrf
        @method('post')
        <x-form.input type="email" name="email" label="ایمیل خود را وارد کنید" placeholder="example@domain.com"></x-form.input>
        <x-form.input type="password" name="password" label="رمز عبور خود را وارد کنید" placeholder="example@domain.com"></x-form.input>
        <x-button color="blue">ورود</x-button>
    </form>
@endsection


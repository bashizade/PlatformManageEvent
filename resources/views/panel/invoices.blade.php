@extends('layouts.panel.master')

@section('title','مالی')

@section('content')
    <x-modal modalID="create-invoice" header="ساخت سند مالی" button="افزودن فاکتور +">
        <form action="" method="post">
            @csrf
            @method('post')
            <x-form.select label="رویداد مورد نظر را انتخاب کنید" name="event_id"></x-form.select>
            <x-form.input type="number" name="number" label="شماره فاکتور را وارد کنید" placeholder="568..."></x-form.input>
            <x-form.input type="text" name="date" label="تاریخ صدور فاکتور را وارد کنید" placeholder="1402/05/02"></x-form.input>
            <x-form.input type="text" name="agent" label="نام فرد درخواست کننده" placeholder="امیر.."></x-form.input>
            <x-form.input type="file" name="patch_file" label="فایل تصویر فاکتور را وارد کنید" placeholder="..."></x-form.input>
            <x-button color="green">ثبت فاکتور</x-button>
        </form>
    </x-modal>
@endsection

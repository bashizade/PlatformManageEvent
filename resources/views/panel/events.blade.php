@extends('layouts.panel.master')

@section('title','رویداد ها')

@section('content')

    <x-modal modalID="create-event" header="ساخت رویداد جدید" button="افزودن رویداد +">
        <form action="{{ route('panel.event.create') }}" method="post">
            @csrf
            @method('post')
            <x-form.input type="text" name="title" placeholder="رویداد بازی سازی ..." label="عنوان رویداد"/>
            <x-form.input type="text" name="description" placeholder="رویداد در جهت ..." label="توضیحات رویداد"/>
            <x-form.input type="text" name="start_date" placeholder="1402/05/12" label="تاریخ شروع رویداد"/>
            <x-form.input type="text" name="end_date" placeholder="1402/05/15" label="تاریخ پایان رویداد"/>
            <x-form.select name="unit_id" label="واحد رویداد">
                <option value="">واحد رویداد را انتخاب کنید</option>
                <option value="1">1</option>
            </x-form.select>
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">افزودن</button>
        </form>
    </x-modal>

@endsection

@extends('layouts.panel.master')

@section('title','مالی')

@section('content')
    <x-modal modalID="create-invoice" header="ساخت سند مالی" button="افزودن فاکتور +">
        <form action="{{ route('panel.invoice.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <x-form.select label="رویداد مورد نظر را انتخاب کنید" name="event_id">
                <option value="" dir="rtl">رویداد را انتخاب کنید.....</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" dir="rtl">{{ $event->title }}</option>
                @endforeach
            </x-form.select>
            <x-form.input type="number" name="number" label="شماره فاکتور را وارد کنید" placeholder="568..."></x-form.input>
            <x-form.input type="text" name="date" label="تاریخ صدور فاکتور را وارد کنید" placeholder="1402/05/02"></x-form.input>
            <x-form.input type="text" name="agent" label="نام فرد درخواست کننده" placeholder="امیر.."></x-form.input>
            <x-form.input type="file" name="patch_file" label="فایل تصویر فاکتور را وارد کنید" placeholder="..."></x-form.input>
            <x-button color="green">ثبت فاکتور</x-button>
        </form>
    </x-modal>

    <x-table.body>
        <x-table.tr>
            <x-table.td>نام رویداد</x-table.td>
            <x-table.td>شماره فاکتور</x-table.td>
            <x-table.td>تاریخ فاکتور</x-table.td>
            <x-table.td>نام درخواست کننده</x-table.td>
            <x-table.td>فایل ضمیمه</x-table.td>
            <x-table.td>وضعیت</x-table.td>
            <x-table.td></x-table.td>
        </x-table.tr>

        @foreach($invoices as $invoice)
            <x-table.tr>
                <x-table.td>{{ $invoice->event->title }}</x-table.td>
                <x-table.td>{{ $invoice->number }}</x-table.td>
                <x-table.td>{{ $invoice->date }}</x-table.td>
                <x-table.td>{{ $invoice->agent }}</x-table.td>
                <x-table.td>
                    <x-modal modalID="file-invoice-{{ $invoice->id }}" header="مشاهده فایل" button="مشاهده فایل">
                        <img src="{{ $invoice->patch_file }}" alt="file" />
                    </x-modal>
                </x-table.td>
                <x-table.td>
                    @if($invoice->status == 1)
                        ثبت شده
                    @elseif($invoice->status == 2)
                        تایید شده
                    @elseif($invoice->status == 3)
                        پرداخت شده
                    @elseif($invoice->status == 4)
                        رد شده
                    @endif
                </x-table.td>
                <x-table.td></x-table.td>
            </x-table.tr>
        @endforeach
    </x-table.body>
@endsection

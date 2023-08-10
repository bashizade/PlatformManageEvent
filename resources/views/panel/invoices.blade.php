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
                <x-table.td>
                    <div class="flex text-right">
                        <div class="mt-3">
                            <x-modal modalID="update-invoice-{{ $invoice->id }}" header="ویرایش سند مالی" button="ویرایش">
                                <form action="{{ route('panel.invoice.update',['invoice' => $invoice]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <x-form.select label="رویداد مورد نظر را انتخاب کنید" name="event_id">
                                        <option value="" dir="rtl">رویداد را انتخاب کنید.....</option>
                                        @foreach($events as $event)
                                            <option value="{{ $event->id }}" dir="rtl" {{ $invoice->event_id == $event->id ? "selected" : "" }}>{{ $event->title }}</option>
                                        @endforeach
                                    </x-form.select>
                                    <x-form.input type="number" name="number" label="شماره فاکتور را وارد کنید" placeholder="568...">{{ $invoice->number }}</x-form.input>
                                    <x-form.input type="text" name="date" label="تاریخ صدور فاکتور را وارد کنید" placeholder="1402/05/02">{{ $invoice->date }}</x-form.input>
                                    <x-form.input type="text" name="agent" label="نام فرد درخواست کننده" placeholder="امیر..">{{ $invoice->agent }}</x-form.input>
                                    <x-form.input type="file" name="patch_file" label="فایل تصویر فاکتور را وارد کنید" placeholder="..."></x-form.input>
                                    <x-button color="green">ویرایش فاکتور</x-button>
                                </form>
                            </x-modal>
                        </div>
                        <div>
                            @if($invoice->status == 1)
                                <form action="{{ route('panel.invoice.change_status',['invoice' => $invoice]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="2">
                                    <x-button color="purple">تغییر وضعیت به تایید شده</x-button>
                                </form>
                                <form action="{{ route('panel.invoice.change_status',['invoice' => $invoice]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="4">
                                    <x-button color="purple">تغییر وضعیت به رد شده</x-button>
                                </form>
                            @elseif($invoice->status == 2)
                                <form action="{{ route('panel.invoice.change_status',['invoice' => $invoice]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="3">
                                    <x-button color="purple">تغییر وضعیت به پرداخت شده</x-button>
                                </form>
                            @endif
                        </div>
                        <div>
                            <form action="{{ route('panel.invoice.delete',['invoice' => $invoice]) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-button color="red">حذف کردن</x-button>
                            </form>
                        </div>
                    </div>
                </x-table.td>
            </x-table.tr>
        @endforeach
    </x-table.body>
@endsection

@extends('layouts.panel.master')

@section('title','رویداد ها')

@section('content')

    <x-modal modalID="create-event" header="ساخت رویداد جدید" button="افزودن رویداد +">
        <form action="{{ route('panel.event.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <x-form.input type="text" name="title" placeholder="رویداد بازی سازی ..." label="عنوان رویداد"/>
            <x-form.input type="text" name="description" placeholder="رویداد در جهت ..." label="توضیحات رویداد"/>
            <x-form.input type="text" name="start_date" placeholder="1402/05/12" label="تاریخ شروع رویداد"/>
            <x-form.input type="text" name="end_date" placeholder="1402/05/15" label="تاریخ پایان رویداد"/>
            <x-form.input type="number" name="count" placeholder="100" label="تعداد بلیط ورودی رویداد"/>
            <x-form.input type="number" name="price" placeholder="150000" label="قیمت هر بلیط رویداد"/>
            <x-form.input type="text" name="message" placeholder="رویداد در ساعت ..." label="توضیحات ارسالی به کاربر درباره رویداد"/>
            <x-form.input type="file" name="file_patch" placeholder="..." label="تصاویر را وارد کنید"/>
            <x-form.select2 name="categories" label="دسته بندی رویداد">
                <option value="">دسته بندی رویداد را انتخاب کنید</option>
                <option value="1">11</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select2>
            <x-button color="green">افزودن</x-button>
        </form>
    </x-modal>

    <x-table.body>
        <x-table.tr>
            <x-table.td>عنوان رویداد</x-table.td>
            <x-table.td>تاریخ شروع رویداد</x-table.td>
            <x-table.td>تعداد بلیط باقی مانده</x-table.td>
            <x-table.td>تعداد بازدید صفحه رویداد</x-table.td>
            <x-table.td></x-table.td>
        </x-table.tr>
        @foreach($events as $event)
            <x-table.tr>
                <x-table.td>{{ $event->title }}</x-table.td>
                <x-table.td>{{ $event->start_date }}</x-table.td>
                <x-table.td>{{ $event->count }}</x-table.td>
                <x-table.td>{{ $event->view }}</x-table.td>
                <x-table.td>
                    <div class="flex">
                        <div>
                            <x-button color="purple">مشاهده</x-button>
                        </div>
                        <div class="text-right mt-3 mr-2">
                            <x-modal modalID="update-event-{{ $event->id }}" header="ساخت رویداد جدید" button="ویرایش">
                                <form action="{{ route('panel.event.update',['event'=>$event]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <x-form.input type="text" name="title" placeholder="رویداد بازی سازی ..." label="عنوان رویداد">{{ $event->title }}</x-form.input>
                                    <x-form.input type="text" name="description" placeholder="رویداد در جهت ..." label="توضیحات رویداد">{{ $event->description }}</x-form.input>
                                    <x-form.input type="text" name="start_date" placeholder="1402/05/12" label="تاریخ شروع رویداد">{{ $event->start_date }}</x-form.input>
                                    <x-form.input type="text" name="end_date" placeholder="1402/05/15" label="تاریخ پایان رویداد">{{ $event->end_date }}</x-form.input>
                                    <x-form.input type="number" name="count" placeholder="100" label="تعداد بلیط ورودی رویداد">{{ $event->count }}</x-form.input>
                                    <x-form.input type="number" name="price" placeholder="150000" label="قیمت هر بلیط رویداد">{{ $event->price }}</x-form.input>
                                    <x-form.input type="text" name="message" placeholder="رویداد در ساعت ..." label="توضیحات ارسالی به کاربر درباره رویداد">{{ $event->message }}</x-form.input>
                                    <x-form.select2 name="categories" label="دسته بندی رویداد">
                                        <option value="">دسته بندی رویداد را انتخاب کنید</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $event->category()->where('category_id',$category->id)->count() > 0 ? "selected" : "" }}>{{ $category->title }}</option>
                                        @endforeach
                                    </x-form.select2>
                                    <x-button color="green">ویرایش</x-button>
                                </form>
                            </x-modal>
                        </div>
                        <div>
                            @if($event->status == 1)
                                <form action="{{ route('panel.event.disable',['event'=>$event]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="status" value="2">
                                    <x-button color="red">غیرفعال کردن</x-button>
                                </form>
                            @else
                                <form action="{{ route('panel.event.enable',['event'=>$event]) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="status" value="1">
                                    <x-button color="green">فعال کردن</x-button>
                                </form>
                            @endif
                        </div>
                    </div>
                </x-table.td>
            </x-table.tr>
        @endforeach
    </x-table.body>

@endsection

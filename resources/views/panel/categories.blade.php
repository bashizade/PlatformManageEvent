@extends('layouts.panel.master')

@section('title','دسته بندی ها')

@section('content')
    <x-modal modalID="category-create" header="ساخت دسته بندی جدید" button="افزودن دسته بندی +">
        <form action="{{ route('panel.category.create') }}" method="post">
            @csrf
            @method('post')
            <x-form.input type="text" name="title" placeholder="جشن.." label="نام دسته بندی را وارد کنید"></x-form.input>
            <x-button color="green">ثبت دسته بندی</x-button>
        </form>
    </x-modal>
    <x-table.body>
        <x-table.tr>
            <x-table.td>عنوان دسته بندی</x-table.td>
            <x-table.td></x-table.td>
        </x-table.tr>
        @foreach($categories as $category)
            <x-table.tr>
                <x-table.td>{{ $category->title }}</x-table.td>
                <x-table.td>
                    <div class="flex text-right">
                        <div class="mt-3">
                            <x-modal modalID="category-update-{{ $category->id }}" header="ویرایش دسته بندی " button="ویرایش">
                                <form action="{{ route('panel.category.update',['category' => $category]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <x-form.input type="text" name="title" placeholder="جشن.." label="نام دسته بندی را وارد کنید">{{ $category->title }}</x-form.input>
                                    <x-button color="green">ویرایش دسته بندی</x-button>
                                </form>
                            </x-modal>
                        </div>
                        <div>
                            <form action="{{ route('panel.category.delete',['category' => $category]) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-button color="red">حذف</x-button>
                            </form>
                        </div>
                    </div>
                </x-table.td>
            </x-table.tr>
        @endforeach
    </x-table.body>
@endsection

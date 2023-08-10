@extends('layouts.panel.master')

@section('title','کاربران')

@section('content')
    <x-table.body>
        <x-table.tr>
            <x-table.td>نام کاربری</x-table.td>
            <x-table.td>ایمیل</x-table.td>
            <x-table.td>نقش کاربر</x-table.td>
            <x-table.td></x-table.td>
        </x-table.tr>
        @foreach($users as $user)
            <x-table.tr>
                <x-table.td>{{ $user->username }}</x-table.td>
                <x-table.td>{{ $user->email }}</x-table.td>
                <x-table.td>{{ $user->is_admin ? "مدیر" : ($user->is_agent ? "برگزار کننده" : "معمولی") }}</x-table.td>
                <x-table.td>
                    <div class="flex text-right">
                        <div>
                            <form action="{{ route('panel.user.to_admin',['user' => $user]) }}" method="post">
                                @csrf
                                @method('put')
                                <x-button color="purple">دادن دسترسی ادمین</x-button>
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('panel.user.to_agent',['user' => $user]) }}" method="post">
                                @csrf
                                @method('put')
                                <x-button color="red">دادن دسترسی برگزارکننده</x-button>
                            </form>
                        </div>
                    </div>
                </x-table.td>
            </x-table.tr>
        @endforeach
    </x-table.body>
@endsection

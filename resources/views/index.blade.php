@extends('layouts.app')

@section('content')
    <x-carousel></x-carousel>

    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="my-6">
            <h1 class="text-center text-2xl font-bold mb-1">لیست رویداد های ثبت نام شده کاربر</h1>
            <div class="md:grid grid-cols-3 gap-2">
                @forelse(\App\Models\EventUser::query()->where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $ev_user)
                    <x-event-card imageSRC="{{ $ev_user->event->file_patch }}" title="{{ $ev_user->event->title }}" link="#" />
                @empty
                    <p class="col-span-3 text-center">رویدادی ثبت نام نشده اید</p>
                @endforelse
            </div>
        </div>
    @endif

    <div class="my-6">
        <h1 class="text-center text-2xl font-bold mb-1">لیست رویداد های فعال</h1>
        <div class="md:grid grid-cols-3 gap-2">
            @forelse($events as $event)
                <x-event-card imageSRC="{{ $event->file_patch }}" title="{{ $event->title }}" link="{{ route('user_register_to_event',['event' => $event]) }}" />
            @empty
                <p class="col-span-3 text-center">رویدادی فعال نیست</p>
            @endforelse

        </div>
    </div>

@endsection


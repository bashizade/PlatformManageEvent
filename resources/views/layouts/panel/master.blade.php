<!DOCTYPE html>
<html lang="en" x-data="{isDark:true}" :class="isDark ? 'dark' : ''" class="">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body x-data="{isOpenMenu:false}" class="bg-white dark:bg-slate-800">

@include('layouts.panel.topbar')

@include('layouts.panel.sidebar')

<div class="pr-3 lg:pr-[16.75rem] pt-20 pb-3 pl-3 text-right w-full dark:text-gray-100">
    @yield('content')
</div>

<script defer src="{{ asset('js/alpine.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

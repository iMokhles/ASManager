<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    {{-- Site-Head --}}
    @include('web.inc.head')
</head>
<body>

{{-- Navigation Bar --}}

{{--@if(!isset($hideHeader))--}}
    <header id="topnav">
        @include('web.main_header.main_header')
    </header>
{{--@endif--}}


<div class="wrapper">
    <div class="container-fluid">

        @yield('content')
        @stack('content')

    </div>
</div>

@include('web.inc.scripts')
</body>
</html>
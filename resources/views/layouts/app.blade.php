<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="with=device-width, initial-scale=1">

        <!-- CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'BBC')- BBC论坛</title>
        <meta name="descroption" content="@yield('description', 'BBC论坛')" />
        <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'BBC,社区，论坛，开发者论坛'))"/>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>

    <body>
        <div id="app" class="{{ route_class() }}-page">
            @include('layouts._header')

            <div class="container">
                @include('layouts._message')
                @yield('content')
            </div>

            @include('layouts._footer')
        </div>

        @if (app()->isLocal())
            @include('sudosu::user-selector')
        @endif
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
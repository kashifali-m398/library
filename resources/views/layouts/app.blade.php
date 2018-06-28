<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.nav')

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>

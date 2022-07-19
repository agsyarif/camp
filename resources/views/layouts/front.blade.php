<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getlocale()) }}">

<head>
    @include('includes.landing.meta')

    <title>@yield('title') | UWHcamp</title>

    @stack('before-style')

    @include('includes.landing.style')

    @stack('after-style')

</head>

<body class="antialiased">
    <div class="relative">

        @include('includes.landing.header')

        @include('sweetalert::alert')

        @yield('content')

        @include('includes.landing.footer')

        {{-- script js --}}
        @stack('before-script')

        @include('includes.landing.script')

        @stack('after-script')

        {{-- modals --}}
        @include('components.modal.login')
        @include('components.modal.register')
        @include('components.modal.register-success')
    </div>
</body>

</html>

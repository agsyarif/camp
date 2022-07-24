<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getlocale()) }}">

<head>
    @include('includes.Landing.meta')

    <title>@yield('title') | UWHcamp</title>

    @stack('before-style')

    @include('includes.Landing.style')

    @stack('after-style')

</head>

<body class="antialiased">
    <div class="relative">

        @include('includes.Landing.header')

        @include('sweetalert::alert')

        @yield('content')

        @include('includes.Landing.footer')

        {{-- script js --}}
        @stack('before-script')

        @include('includes.Landing.script')

        @stack('after-script')

        {{-- modals --}}
        @include('components.Modal.login')
        @include('components.Modal.register')
        @include('components.Modal.register-success')
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.Landing.meta')
    @include('includes.Landing.style')
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div class="relative">

        <!-- content -->
        <div class="content">

            <div class="mx-auto w-auth mt-5">

                <!-- services -->
                <div class="bg-serv-bg-explore overflow-hidden">
                    <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">

                        <div class="row text-center">
                            <div class="col-lg-12 col-12">
                                <img src="{{ asset('assets/images/ill_register.png') }}" height="400" class="mb-5"
                                    alt=" ">
                            </div>
                            <div class=" col-lg-12 col-12 header-wrap mt-4">
                                <p class="story">
                                    WHAT A DAY!
                                </p>
                                <h2 class="primary-header ">
                                    Berhasil Checkout
                                </h2>
                                <div class="row  mt-4">
                                    <a href="{{ route('member.dashboard.index') }}"
                                        class="px-4 text-green-500 hover:text-gray-800 bg-green-100 border border-transparent rounded-lg shadow-sm">
                                        My Dashboard
                                    </a>
                                    <a href="{{ $url }}"
                                        class="px-4 text-green-500 hover:text-gray-800 bg-green-100 border border-transparent rounded-lg shadow-sm">Bayar
                                        Sekarang</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- script js --}}
    @stack('before-script')

    @include('includes.Landing.script')

    @stack('after-script')

    {{-- modals --}}
    @include('components.Modal.login')
    @include('components.Modal.register')
    @include('components.Modal.register-success')
</body>

</html>

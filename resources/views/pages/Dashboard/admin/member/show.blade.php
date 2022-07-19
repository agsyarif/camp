@extends('layouts.app')

@section('title', 'Detail Order')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My member {{ $member->name ?? '' }}
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $member->user_roles->name }}
                    </p>

                </div>
                <div class="col-span-4 lg:text-right">
                    <div class="relative mt-0 md:mt-6">

                        <button class="">

                        </button>
                        <form action="{{ route('admin.member-management.destroy', $member->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="px-4 py-2 mt-2 text-left text-white bg-red-400 rounded-xl"
                                onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt fa-lg"></i> Delete member
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">

                    <a href="{{ route('admin.member-management.index') }}" class="text-gray-400">My member</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>

                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Details member</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="bg-white rounded-xl">
                        <section class="pt-6 pb-20 mx-8 w-auth">
                            <div class="grid gap-5 md:grid-cols-12">

                                <main class="p-4 lg:col-span-7 md:col-span-12">

                                    <!-- details heading -->
                                    <div class="details-heading">
                                        <h1 class="text-2xl font-semibold">{{ $member->name ?? '' }}</h1>
                                        <div class="my-3">
                                            @include('components.dashboard.rating')
                                        </div>
                                    </div>

                                    <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">

                                        @if ($member->profile_photo_path != null)
                                            <img src="{{ url($member->profile_photo_path) }}" alt=""
                                                class="rounded-lg cursor-pointer w-100" data-lity>
                                        @else
                                            <img class="rounded-lg cursor-pointer w-100"
                                                src="{{ url('https://randomuser.me/api/portraits/men/3.jpg') }}" alt=""
                                                loading="lazy" />
                                        @endif

                                    </div>

                                    {{-- <div class="content">
                                                <div>
                                                    <!-- The tabs content -->
                                                    <div class="leading-8 text-md">

                                                        <h2 class="text-xl font-semibold">Instructors This <span class="text-serv-button">Webinars</span></h2>

                                                        <div class="mt-4 mb-8 content-description">
                                                            <p>
                                                                {{ $webinar->instructors ?? '' }}
                                                            </p>
                                                        </div>

                                                        <h2 class="text-xl font-semibold">Description This <span class="text-serv-button">Webinars</span></h2>

                                                        <div class="mt-4 mb-8 content-description">
                                                            <p>
                                                                {{ $webinar->description ?? '' }}
                                                            </p>
                                                        </div>

                                                        <h3 class="my-4 pb-4 text-lg font-semibold">Information?</h3>

                                                        <ul class="mb-4 list-check">

                                                                <li class="pl-10 flex my-2"><img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}" alt="">{{ $webinar->information ?? '' }}</li>

                                                        </ul>

                                                        <p class="pt-4 font-semibold">
                                                            {{ $webinar->note ?? '' }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div> --}}
                                </main>

                                {{-- <aside class="p-4 lg:col-span-5 md:col-span-12 md:pt-0">
                                            <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                                                <div class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">

                                                    <div class="flex-1 text-sm font-medium text-center">
                                                        <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="8" stroke="#082431" stroke-width="1.5" />
                                                            <path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                        {{ $webinar->tanggal ?? '' }} | {{ $webinar->waktu ?? '' }}
                                                    </div>

                                                    <div class="flex-1 text-sm font-medium text-center">
                                                        <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="24" height="24" fill="white" />
                                                            <path d="M19 13C19 15 19 18.5 14.6552 18.5C9.63448 18.5 6.12644 18.5 5 18.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M4 11.5C4 9.5 4 6 8.34483 6C13.2455 6 16.8724 6 18 6" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M7 21.5L4.14142 18.6414C4.06332 18.5633 4.06332 18.4247 4.14142 18.3586L7 15.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M16 3L18.8586 5.85858C18.9247 5.92468 18.9247 6.06332 18.8586 6.14142L16 9" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                        {{ $webinar->kuota ?? '' }} Orang
                                                    </div>

                                                </div>

                                                <div class="px-4 pt-4 pb-2 features-list">
                                                    <ul class="mb-4 text-sm list-check">
                                                        <li class="pl-10 my-4">Online on Google Meet</li>

                                                        <li class="pl-10 flex my-4"><img class="mr-3" src="{{ asset('/assets/images/ic_secure.svg') }}" alt="">Kota {{ $webinar->lokasi ?? '' }}</li>

                                                    </ul>
                                                </div>

                                                <div class="px-4">
                                                    <table class="w-full mb-4">
                                                        <tr>
                                                            <td class="text-sm leading-7 text-serv-text">
                                                                Status:
                                                            </td>
                                                            <td class="mb-4 text-xl font-semibold text-right text-serv-button">
                                                                {{ $webinar->status->name ?? '' }}
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>
                                        </aside>

                                        <div class=" lg:col-span-6 md:col-span-12">

                                                <button type="submit" class="inline-flex justify-center px-3 py-3 mb-2 text-sm font-medium text-black bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                    {{ $webinar->user->name ?? '' }}
                                                </button>

                                        </div> --}}

                                <div class="p-4 md:text-right lg:col-span-6 md:col-span-12">
                                    <a href="#"
                                        class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                                        See Reviews
                                    </a>

                                    <a href="{{ route('admin.member-management.edit', $member->id) }}"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-lg shadow-sm bg-serv-email hover:bg-serv-email-text focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-serv-email">
                                        Edit member
                                    </a>
                                </div>

                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection

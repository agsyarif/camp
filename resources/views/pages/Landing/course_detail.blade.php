@extends('layouts.front')

@section('title', 'Detail')
@section('content')

    <div class="relative">
        {{-- top --}}
        <div>

            <hr class="mx-8 lg:mx-16 border-serv-hr">

            <!-- breadcrumb -->
            <nav class="mx-8 mt-8 text-sm lg:mx-20" aria-label="Breadcrumb">
                <ol class="inline-flex p-0 list-none">

                    <li class="flex items-center">
                        <a href="{{ route('explore.landing') }}" class="text-gray-400">Bootcamp</a>

                        <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>

                    <li class="flex items-center">
                        <a href="#" class="font-medium">{{ $courses->name ?? '' }}</a>
                    </li>
                </ol>
            </nav>

        </div>

        {{-- details --}}
        <section class="px-4 pt-6 pb-20 mx-auto w-auth lg:mx-12">
            <div class="grid gap-5 md:grid-cols-12">

                <main class="p-4 lg:col-span-8 md:col-span-12">

                    {{-- detail Heading --}}
                    <div class="details-heading">
                        {{-- <div class="flex justify-center mb-5">
                            <span
                                class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl text-center">
                                Member <br><br>
                                200 enrolled
                            </span>
                            <span
                                class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl">
                                Tingkatan <br><br>
                                @include('components.Landing.level')
                                {{ $courses->level }}
                            </span>
                        </div> --}}

                        <h1 class="text-2xl font-semibold">{{ $courses->name ?? '' }}</h1>

                        {{-- <div class="my-3">
                            @include('components.Landing.rating')
                        </div> --}}
                    </div>

                    <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">
                        <img :src="featured" alt="" class="rounded-lg cursor-pointer w-100" data-lity>

                        <div class="flex overflow-x-scroll hide-scroll-bar dragscroll">
                            <div class="flex mt-2 flex-nowrap">

                                @if ($courses->image != null)
                                    <img src="{{ asset('images/course/thumbnail/' . $courses->image) }}"
                                        alt="Thumbnail Course" loading="lazy" class="w-full h-26 object-cover rounded-2xl ">
                                @else
                                    <img src="{{ url('https://via.placeholder.com/640x360') }}" alt="Thumbnail Course"
                                        loading="lazy" class="w-full h-26 object-cover rounded-2xl ">
                                @endif



                                {{-- @forelse ($thumbnail as $item)
                                    <img :class="{ 'border-4 border-serv-button': active === {{ $item->id }} }"
                                        @click="changeThumbnail('{{ url(Storage::url($item->thumbnail)) }}', {{ $item->id }})"
                                        src="{{ url(Storage::url($item->thumbnail)) }}" alt="Thumbnail service"
                                        class="inline-block mr-2 rounded-lg cursor-pointer h-20 w-36 object-cover">
                                @empty
                                    empty
                                @endforelse --}}

                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'description' }" id="tab_wrapper">
                            <!-- The tabs navigation -->
                            <nav class="my-8" aria-label="navigation">
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl"
                                    :class="{
                                        'bg-serv-bg text-white': tab ===
                                            'description',
                                        'bg-serv-services-bg text-serv-bg': tab !== 'description'
                                    }"
                                    @click.prevent="tab = 'description'; window.location.hash = 'description'"
                                    href="#">Description</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl"
                                    :class="{
                                        'bg-serv-bg text-white': tab ===
                                            'seller',
                                        'bg-serv-services-bg text-serv-bg': tab !== 'seller'
                                    }"
                                    @click.prevent="tab = 'seller'; window.location.hash = 'seller'" href="#">About
                                    The
                                    Seller</a>
                                <a class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl"
                                    :class="{
                                        'bg-serv-bg text-white': tab ===
                                            'reviews',
                                        'bg-serv-services-bg text-serv-bg': tab !== 'reviews'
                                    }"
                                    @click.prevent="tab = 'reviews'; window.location.hash = 'reviews'"
                                    href="#">Reviews</a>
                            </nav>

                            <!-- The tabs content -->
                            <div x-show.transition.duration.500ms="tab === 'description'" class="leading-8 text-md">
                                <h2 class="text-xl font-semibold">Develop Your <span class="text-serv-button">Skills</span>
                                </h2>

                                <div class="mt-4 mb-8 content-description">

                                    <p class="mb-4 font-reguler text-grey-50">
                                        {{ $courses->description ?? '' }}
                                    </p>

                                </div>

                                <h3 class="my-4 text-lg font-semibold">Key Points?</h3>

                                <ul class="mb-5 list-check">
                                    {{-- @forelse ($advantage_service as $item)
                                        <li class="pl-10 flex my-2"><img class="mr-3"
                                                src="{{ asset('/assets/images/check-icon.svg') }}" alt="">
                                            {{ $item->advantage ?? '' }}</li>

                                    @empty
                                        empty
                                    @endforelse --}}

                                </ul>

                                <h3 class="my-4 text-lg font-semibold">Benefits Bootcamp</h3>

                                <div class="mb-8 skills">

                                    {{-- @forelse ($tagline as $item)
                                        <li class="pl-10 flex my-2 ">
                                            <img class="mr-3" src="{{ asset('/assets/images/check-icon.svg') }}"
                                                alt=""><span
                                                class="inline-block px-3 py-2 mr-2 rounded bg-serv-services-bg">{{ $item->tagline ?? '' }}</span>
                                        </li>

                                    @empty
                                        Empty
                                    @endforelse --}}

                                </div>

                                <p class="mb-5">
                                    {{ $courses->user->detail_user->biography ?? '' }}
                                </p>

                                <a href="https://wa.me/0885092116?text=Hi, Saya ingin bertanya tentang Bootcamp di UWHcamp ini??"
                                    class="mb-4 font-medium">
                                    WA /{{ $courses->user->detail_user->contact_number ?? '' }}
                                </a>
                            </div>

                            <div x-show.transition.duration.500ms="tab === 'seller'" class="leading-8 text-md">
                                <h2 class="mb-4 text-xl font-semibold">About <span class="text-serv-button">Bootcamp</span>
                                </h2>

                                <div class="grid md:grid-cols-12">
                                    <div class="flex items-center col-span-12 p-2 lg:col-span-6">
                                        <div class="flex items-center space-x-4">

                                            @if ($courses->user->profile_photo_path != null)
                                                <img class="w-20 h-20 object-cover rounded-full"
                                                    src="{{ asset('assets/images/profile/' . Auth::user()->profile_photo_path) }}"
                                                    alt="Photo profile" loading="lazy">
                                            @else
                                                <img class="object-cover w-16 h-16 mr-4 rounded-full"
                                                    src="{{ url('https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60') }}"
                                                    alt="avatar">
                                            @endif

                                        </div>

                                        <div class="flex-grow p-4 -mt-8 leading-8 lg:mt-0">
                                            <div class="text-lg font-semibold text-gray-700">
                                                {{ $courses->user->name ?? '' }}
                                            </div>

                                            <div class="text-gray-400">
                                                {{ $courses->user->detail_user->address ?? '' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items-center col-span-12 p-2 lg:col-span-6">
                                        <div class="ml-24 -mt-10 lg:my-6 lg:text-right">
                                            @include('components.Landing.rating')
                                        </div>
                                    </div>
                                </div>

                                <h3 class="my-4 text-lg font-semibold">Description Bootcamp</h3>

                                <div class="mt-4 mb-8 content-description">
                                    <p>
                                        {{ $courses->description ?? '' }}
                                    </p>
                                </div>

                                <h3 class="my-4 text-lg font-semibold">Details Bootcamp</h3>

                                <ul class="mb-8 list-check">

                                    {{-- @forelse ($advantage_user as $item)
                                        <li class="pl-10 flex my-2 "><img class="mr-3"
                                                src="{{ asset('/assets/images/ic_secure.svg') }}"
                                                alt="">{{ $item->advantage ?? '' }}</li>

                                    @empty
                                        empty
                                    @endforelse --}}

                                </ul>

                                <hr class="border-serv-services-bg">

                                <p class="my-4 text-lg text-gray-400">
                                    Joined Since {{ date('d F Y', strtotime($courses->created_at)) ?? '' }}
                                </p>
                            </div>

                            <div x-show.transition.duration.500ms="tab === 'reviews'">
                                <h2 class="mb-4 text-xl font-semibold"><span class="text-serv-button">210</span> Happy
                                    Clients</h2>
                                @include('components.Landing.review')
                                @include('components.Landing.review')
                                @include('components.Landing.review')
                            </div>
                        </div>
                    </div>

                </main>

                <aside class="p-4 lg:col-span-4 md:col-span-12 md:pt-0">
                    <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                        <!--horizantil margin is just for display-->
                        <div class="flex items-start px-4 pt-6">

                            @if ($courses->user->profile_photo_path != null)
                                <img class="object-cover w-16 h-16 mr-4 rounded-full"
                                    src="{{ asset('assets/images/profile/' . Auth::user()->profile_photo_path) }}"
                                    alt="Photo profile" loading="lazy">
                            @else
                                <img class="object-cover w-16 h-16 mr-4 rounded-full"
                                    src="{{ url('https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60') }}"
                                    alt="avatar">
                            @endif

                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <h2 class="my-1 text-xl font-medium text-serv-bg">{{ $courses->user->name ?? '' }}
                                    </h2>
                                </div>

                                <p class="text-md text-serv-text">
                                    {{ $courses->user->user_roles->name ?? '' }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border">
                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="8" stroke="#082431"
                                        stroke-width="1.5" />
                                    <path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                {{ $courses->delivery_time ?? '' }} Course Duration
                            </div>

                            <div class="flex-1 text-sm font-medium text-center">
                                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" fill="white" />
                                    <path d="M19 13C19 15 19 18.5 14.6552 18.5C9.63448 18.5 6.12644 18.5 5 18.5"
                                        stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 11.5C4 9.5 4 6 8.34483 6C13.3655 6 16.8736 6 18 6" stroke="#082431"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M7 21.5L4.14142 18.6414C4.06332 18.5633 4.06332 18.4367 4.14142 18.3586L7 15.5"
                                        stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M16 3L18.8586 5.85858C18.9367 5.93668 18.9367 6.06332 18.8586 6.14142L16 9"
                                        stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                                {{-- <i class="fas fa-book" style="color: black"></i> --}}
                                {{ $material->count() ?? '' }} Lessons
                            </div>
                        </div>

                        <div class="px-4 pt-4 pb-2 features-list">
                            <ul class="mb-4 text-sm list-check">

                                {{-- <li class="pl-10 my-4">{{ $courses->tagline->count() }} Pages</li> --}}

                                {{-- @forelse ($tagline as $item)
                                    <li class="pl-10 flex my-4"><img class="mr-3"
                                            src="{{ asset('/assets/images/ic_secure.svg') }}"
                                            alt="">{{ $item->tagline ?? '' }}</li>

                                @empty
                                    empty
                                @endforelse --}}

                            </ul>
                        </div>

                        <div class="px-4">

                            <table class="w-full mb-4">
                                <tr>
                                    <td class="text-sm leading-7 text-serv-text">
                                        Price starts from:
                                    </td>

                                    <td class="mb-4 text-xl font-semibold text-right text-serv-button">
                                        {{ 'Rp. ' . number_format($courses->price) ?? '' }}
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <div class="px-4 pb-4 booking">

                            @auth

                                {{-- <a href="{{ route('booking.landing', $courses->id) }}"
                                    class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                    Gabung Kelas
                                </a> --}}

                                <form action="{{ route('booking.landing', $courses->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                        Gabung Kelas
                                    </button>
                                </form>

                            @endauth

                            @guest

                                <a onclick="toggleModal('loginModal')"
                                    class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">
                                    Gabung Kelas
                                </a>

                            @endguest
                        </div>
                    </div>
                </aside>

            </div>
        </section>
        {{-- details --}}


    </div>

@endsection

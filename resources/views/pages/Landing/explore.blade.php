@extends('layouts.front')

@section('title', 'Explore')

@section('content')

    <div class="relative">

        <!-- content -->
        <div class="content">
            <!-- services -->
            <div class="bg-serv-bg-explore overflow-hidden">
                <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">
                    <div class="text-center">
                        <h1 class="text-3xl font-semibold mb-1">Course Overviews</h1>

                        <p class="leading-8 text-serv-text mb-10">
                            Follow Bootcamp to improve your skills, Right Now!
                        </p>
                    </div>

                    <nav class="my-8 text-center" aria-label="navigation">
                        <a class="bg-serv-bg text-white block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl"
                            href="#">
                            All Services
                        </a>

                        @forelse ($course_category as $key => $category)
                            <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl"
                                href="#">
                                {{ $category->name }}
                            </a>

                        @empty
                        @endforelse

                    </nav>

                    <div class="grid grid-cols lg:grid-cols-3 md:grid-cols-2 gap-4">

                        {{-- @forelse ($services as $service)
                            @include('components.landing.service-explorer')

                        @empty --}}
                        {{-- Empty --}}
                        {{-- @endforelse --}}
                        {{-- ~~~~~~~~~~~~~~ Course view ~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
                        @forelse ($courses as $key => $course)
                            {{-- <p>{{ $course->user->user_role->role }}</p> --}}
                            @include('components.Landing.course')


                        @empty
                        @endforelse
                        {{-- ~~~~~~~~~~~~~~ Course view ~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

                    </div>



                    <div class="text-center mt-10">
                        {{ $courses->links('vendor.pagination.custom') }}
                        <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl"
                            href="#">
                            Load More
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

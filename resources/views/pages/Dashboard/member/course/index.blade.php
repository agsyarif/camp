@extends('layouts.app')

@section('title', 'Class')
@section('content')

    @if ($course != null)

        <main class="h-full overflow-y-auto">
            <div class="container mx-auto">
                <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                    <div class="col-span-8">

                        <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                            Kelas Saya
                        </h2>

                        <p class="text-sm text-gray-400">
                            Belajar dengan giat, untuk masa depan yang lebih baik.
                        </p>
                    </div>

                    <div class="col-span-4 lg:text-right"></div>

                </div>
            </div>

            <section class="container px-6 mx-auto mt-5">
                <div class="grid gap-5 md:grid-cols-12">
                    <main class="col-span-12 p-4 md:pt-0">

                        <div class="p-6 bg-grey rounded-xl">

                            <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
                                {{-- {{ route('member.course.show', [$course->id]) }} --}}
                                @forelse ($course as $course)
                                    {{-- <a href="{{ route('member.course.show', [$course->id]) }}" class="">
                                        <div
                                            class="flex flex-col justify-center px-4 py-4 mb-4 bg-white hover:bg-gray-300 rounded-xl">
                                            <div>
                                                <div>

                                                    @if ($course->image != null)
                                                        <img class="object-cover w-50 h-30 rounded"
                                                            src="{{ asset('/assets/images/courses/' . $course->image) }}"
                                                            alt="" loading="lazy" />
                                                    @else
                                                        <img class="object-cover w-50 h-30 rounded"
                                                            src="{{ asset('/assets/images/online-learning.png') }}"
                                                            alt="" loading="lazy" />
                                                    @endif
                                                </div>

                                                <p class="mt-5 text-xl font-semibold text-left text-gray-800">
                                                    {{ $course->name ?? '' }}</p>

                                                <p class="text-base font-reguler text-left text-gray-400">
                                                    {{ $course->level->name ?? '' }}</p>


                                                <p class="text-md text-left font-normal py-5 text-gray-800">
                                                    {{ $course->user->name ?? '' }}<br class="hidden lg:block">
                                                    <span
                                                        class="text-sm text-gray-500">{{ $course->user->user_roles->name ?? '' }}</span>
                                                </p>

                                            </div>
                                        </div>
                                    </a> --}}
                                    <a href="{{ route('member.course.show', [$course->id]) }}" class="">
                                        <div
                                            class="flex flex-col justify-center px-4 py-4 mb-4 bg-white hover:bg-gray-300 rounded-xl">
                                            <div>
                                                <div>

                                                    @if ($course->image != null)
                                                        <img class="object-cover w-50 h-30 rounded"
                                                            src="{{ asset('/assets/images/courses/' . $course->image) }}"
                                                            alt="" loading="lazy" />
                                                    @else
                                                        <img class="object-cover w-50 h-30 rounded"
                                                            src="{{ asset('/assets/images/online-learning.png') }}"
                                                            alt="" loading="lazy" />
                                                    @endif
                                                </div>

                                                <p class="mt-5 text-xl font-semibold text-left text-gray-800">
                                                    {{ $course->name ?? '' }}</p>

                                                <p class="text-base font-reguler text-left text-gray-400">
                                                    {{ $course->level->name ?? '' }}</p>


                                                <p class="text-md text-left font-normal py-5 text-gray-800">
                                                    {{ $course->user->name ?? '' }}<br class="hidden lg:block">
                                                    <span
                                                        class="text-sm text-gray-500">{{ $course->user->user_roles->name ?? '' }}</span>
                                                </p>

                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    {{-- empty --}}
                                @endforelse

                            </div>

                        </div>

                    </main>
                </div>
            </section>
        </main>
    @else
        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Request Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven’t ordered any service. <br>
                    Let’s order your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('explore.landing') }}"
                        class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        Find Services
                    </a>
                </div>
            </div>
        </div>

    @endif


@endsection

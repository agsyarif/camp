@extends('layouts.app')

@section('title', 'My Course')

@section('content')


    @if ($courses > 0)

        <main class="h-full overflow-y-auto">

            <div class="container mx-auto">
                <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                    <div class="col-span-8">

                        <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                            My course
                        </h2>

                        <p class="text-sm text-gray-400">
                            {{ $courses }} Total course
                        </p>
                    </div>

                    <div class="col-span-4 lg:text-right">
                        <div class="relative mt-0 md:mt-6">
                            <a href="{{ route('mentor.course.create') }}"
                                class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                + Add Course
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="container px-6 mx-auto mt-5">
                <div class="grid gap-5 md:grid-cols-12">
                    <main class="col-span-12 p-4 md:pt-0">
                        <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                            <table id="myTable" class="w-full" aria-label="Table">

                                <thead>
                                    <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                        <th class="py-4 text-center" scope="">NO</th>
                                        <th class="py-4" scope="">Title</th>
                                        <th class="py-4" scope="">Category</th>
                                        <th class="py-4" scope="">Price</th>
                                        <th class="py-4 text-center" scope="">Update</th>
                                        <th class="py-4 text-center" scope="">Is Published</th>
                                        <th class="py-4 text-center" scope="">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @forelse ($course as $key => $Course)
                                        <tr class="text-gray-700 border-b">

                                            <td class="font-bold text-center">
                                                @for ($i = 1; $i < $key + 1; $i++)
                                                @endfor {{ $i }}
                                            </td>

                                            <td class="w-2/6 px-1 py-5">
                                                <div class="flex items-center text-sm">

                                                    <div>

                                                        <a href="{{ route('mentor.course.show', $Course->id) }}"
                                                            class="font-medium text-black">
                                                            {{ $Course->name ?? '' }}
                                                        </a>

                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ $Course->course_category->name }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ 'Rp ' . number_format($Course->price ?? '') }}
                                            </td>

                                            <td class="px-1 py-5 text-sm text-green-500 text-md text-center">
                                                <a href="{{ route('mentor.materi.show', $Course->id) }}"
                                                    class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email hover:bg-gray-300">
                                                    Chapter
                                                </a>
                                            </td>

                                            <td class="px-1 py-5 text-sm text-green-500 text-md text-center">

                                                @if ($Course->is_published == 1)
                                                    {{-- {{ $men->status ?? '' }} --}}
                                                    <p class="text-grey-800">
                                                        <i class="fas fa-check"></i>
                                                    </p>
                                                @else
                                                    <p class="text-red-500">
                                                        <i class="fas fa-xmark"></i>
                                                    <p>
                                                @endif

                                            </td>

                                            <td class="px-1 text-sm text-center">

                                                <a href="{{ route('mentor.course.edit', $Course->slug) }}"
                                                    class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>

                                                <form class="inline"
                                                    action="{{ route('mentor.course.destroy', $Course->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>

                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        Empty
                                    @endforelse

                                </tbody>
                            </table>

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
                    There is No Requests Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven’t provided any Course. <br>
                    Let’s create your first Course!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('mentor.course.create') }}"
                        class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add course
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection

@extends('layouts.app')

@section('title', 'My Material')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add a Lesson
                    </h2>

                    <p class="text-sm text-gray-400">
                        Upload Lessons to the Chapter <span class="font-bold">{{ $chapter->title }}</span> You
                        Provided
                    </p>

                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">
                    <a href="{{ route('mentor.dashboard.index') }}" class="text-gray-400">My Dashboard</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Add Your Lessons</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.materi.update', [$materi->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">


                                        <div class="col-span-6">

                                            <label for="chapter_id"
                                                class="block mb-2 font-medium text-gray-700 text-md">Chapter</label>

                                            <div class="flex space-x-2">

                                                <select name="chapter_id" id="chapter_id"
                                                    class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                    <option value="">Select Chapter</option>

                                                    @forelse ($chapterAll as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $chapter->id ? 'selected' : '' }}>
                                                            {{ $item->title }}</option>
                                                    @empty
                                                        Data Empty
                                                    @endforelse


                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <div class="wrapper">
                                                <div class="image image-edit">
                                                    <video id="preview" playsinline controls>
                                                        <source
                                                            src="{{ asset('storage/course/video/' . $materi->video_url) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>
                                                <div class="content">
                                                    <div class="icon">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </div>
                                                    <div class="text">
                                                        No file chosen, yet!
                                                    </div>
                                                </div>
                                                <div id="cancel-btn">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <div class="file-name">
                                                    File name here
                                                </div>
                                            </div>

                                            {{-- <img src="{{ asset('assets/images/courses/' . $courses->image) }}"
                                                alt="{{ $courses->image }}" class="w-full"> --}}
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <label for="title"
                                                class="block mb-3 font-medium text-gray-700 text-md">Materi</label>
                                            <input placeholder="Your Lesson" type="text" name="title" id="title"
                                                autocomplete="title"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $materi->title }}" required>

                                            @if ($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                            <label for="video"
                                                class="block w-full py-3 pl-5 mt-4 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm text-center">Video
                                                Materi</label>
                                            <input type="file" name="video" id="video" hidden>

                                            @if ($errors->has('video'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('video') }}</p>
                                            @endif

                                            <div class="py-3 text-center">
                                                <a href="{{ route('mentor.materi.show', [$chapter->course_id]) }}"
                                                    type="button" style="width: 45%"
                                                    class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                                    onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                    Cancel
                                                </a>

                                                <button type="submit" style="width: 50%"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Are you sure want to submit this data ?')">
                                                    Create Materi
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection

@extends('layouts.app')

@section('title', 'Priview Materi')

@section('content')

    <div class="container mx-auto">
        <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
            <div class="col-span-8">

                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    My material from <br>{{ $chapter->title ?? '' }}
                </h2>

                <p class="text-sm text-gray-400">
                    {{ $chapter->count() }} Total Chapter
                </p>
            </div>

            {{-- <div class="col-span-4 lg:text-right">
                <div class="relative mt-0 md:mt-6">

                    <a href="{{ route('mentor.chapter.show', $courses->id) }}"
                        class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Chapter
                    </a>

                </div>
            </div> --}}
        </div>
    </div>

    <!-- breadcrumb -->
    <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex p-0 list-none">

            <li class="flex items-center">
                <a href="{{ route('mentor.course.index') }}" class="text-gray-400">My Course</a>
                <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>

            <li class="flex items-center">
                <a href="{{ route('mentor.materi.show', $chapter->id) }}" class="font-medium">Chapter</a>
                <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>

            <li class="flex items-center">
                <a href="{{ route('mentor.materi.show', $chapter->id) }}" class="font-medium">Chapter</a>

            </li>

        </ol>
    </nav>


    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-3 sm:col-span-3 px-10" style="height: 390px; margin-top:20px; width: 600px;">
            <div class="wrapper" style="height: 100%;">
                <div class="image image-edit">
                    <video id="preview" playsinline controls>
                        <source src="{{ asset('assets/video/courses/' . $materi->video_url) }}" type="video/mp4">
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
        </div>
        <div class="col-span-3 px-6" style="margin-top: 20px">
            <h2 class="text-xl font-semibold text-gray-700">
                Judul Materi :
            </h2>
            <h2 class="text-2xl mt-5 mb-5 font-semibold text-gray-700">
                {{ $materi->title }}
            </h2>
            <a href="{{ route('mentor.materi.show', $chapter->id) }}" type="button"
                class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                onclick="return confirm('Are You sure want to cancel?, Any changes you make will not be saved')">
                <i class="fas fa-arrow-left py-1"></i>
                <span class="px-3">
                    Kembali
                </span>
            </a>

        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Create My Course')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add Your Exam
                    </h2>

                    <p class="text-sm text-gray-400">
                        Upload the Exam you provide
                    </p>

                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">
                    <a href="{{ route('mentor.course.index') }}" class="text-gray-400">Exam</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Add Your Exam</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.exam.update', [$exam->id]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 ">

                                            <div class="flex space-x-2">
                                                <select id="course" name="course_id" autocomplete="course"
                                                    class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    required>

                                                    <option value="">Course</option>

                                                    @foreach ($course_lesson_all as $crs)
                                                        @if ($crs->id == $exam->course_lesson_id)
                                                            <option value={{ $crs->id }} selected>{{ $crs->title }}
                                                            </option>
                                                        @else
                                                            <option value={{ $crs->id }}>{{ $crs->title }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('course_lesson_id'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('course_lesson_id') }}</p>
                                                @endif

                                            </div>

                                        </div>


                                        {{-- label judul & duration --}}
                                        <div class="col-span-6 -mb-6">

                                            <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul
                                                Exam</label>

                                        </div>

                                        {{-- input judul & duration --}}
                                        <div class="col-span-6">
                                            <input placeholder="judul / tema ujian anda?" type="text" name="title"
                                                id="title" autocomplete="title"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $exam->title }}" required>

                                            @if ($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                        </div>

                                        {{-- label total quetion dan score --}}
                                        <div class="col-span-6  sm:col-span-3 -mb-6">
                                            <label for="title"
                                                class="block mb-3 font-medium text-gray-700 text-md">Duration</label>
                                        </div>
                                        <div class="col-span-6  sm:col-span-3 -mb-6">
                                            <label for="title"
                                                class="block mb-3 font-medium text-gray-700 text-md">Score</label>
                                        </div>

                                        {{-- total quetion dan score --}}
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Durasi Mengerjakan Soal" type="number" name="duration"
                                                id="duration" autocomplete="duration"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $exam->duration }}" required>

                                            @if ($errors->has('duration'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('duration') }}</p>
                                            @endif

                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <input placeholder="Score" type="number" name="score" id="score"
                                                autocomplete="score"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $exam->score }}" required>

                                            @if ($errors->has('score'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('score') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">

                                            <div class="py-6 text-right">

                                                <a href="{{ route('mentor.exam.index') }}" type="button"
                                                    class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                                    onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                    Cancel
                                                </a>

                                                <button type="submit"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Are you sure want to submit this data ?')">
                                                    Update Exam
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

@push('after-script')
    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
@endpush

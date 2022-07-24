@extends('layouts.app')

@section('title', 'Edit, My Course')

@section('content')

    <main class="h-full overflow-y-auto">

        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Edit Your Course
                    </h2>

                    <p class="text-sm text-gray-400">
                        Upload the Course you provide
                    </p>

                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">
                    <a href="{{ route('mentor.course.index') }}" class="text-gray-400">My Bootcamp</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Edit Your Course</a>
                </li>

            </ol>
        </nav>


        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.course.update', [$course->id]) }}" method="POST"
                            enctype="multipart/form-data">

                            @method('PUT')
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 -mb-6">

                                            <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul
                                                Kursus</label>

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <input placeholder="Service apa yang ingin kamu tawarkan?" type="text"
                                                name="title" id="title" autocomplete="title"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $course->name }}" required>

                                            @if ($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <div class="flex space-x-2">
                                                <select id="category_id" name="category_id" autocomplete="category_id"
                                                    class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    required>

                                                    {{-- $course->courses_category --}}

                                                    @forelse ($course_category as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $course->course_category_id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @empty
                                                        Data Empty
                                                    @endforelse

                                                </select>

                                                @if ($errors->has('category_id'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('category_id') }}</p>
                                                @endif

                                                <a href="{{ route('mentor.categories.create') }}"
                                                    class="rounded-lg mt-1 p-2 flex items-center"
                                                    style="background-color: rgb(185, 185, 185)">
                                                    <svg width="20" height="20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path
                                                            d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <label for="slug"
                                                class="block mb-3 font-medium text-gray-700 text-md">Slug</label>

                                            <input placeholder="Samakan dengan title dan tanpa sepasi" type="text"
                                                name="slug" id="slug" autocomplete="slug"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $course->slug }}" required>

                                            @if ($errors->has('slug'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <label for="level_id" class="block mb-3 font-medium text-gray-700 text-md">Level
                                                Kursus</label>

                                            <select id="level_id" name="level_id" autocomplete="level_id"
                                                class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                required>

                                                <option>Tingkat Kesulitan Materi Kursus</option>
                                                @forelse ($level as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $course->level_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @empty
                                                    Data Empty
                                                @endforelse

                                            </select>

                                            @if ($errors->has('level_id'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('level_id') }}
                                                </p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">

                                            <label for="description"
                                                class="block mb-3 font-medium text-gray-700 text-md">Deskripsi
                                                Bootcamp</label>

                                            <textarea placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description"
                                                autocomplete="description"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                rows="4" value="{{ old('description') }}">{{ $course->description }}</textarea>

                                            @if ($errors->has('description'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}
                                                </p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <label for="price" class="block mb-3 font-medium text-gray-700 text-md">Harga
                                                Bootcamp Kamu</label>

                                            <input placeholder="Total Harga Service Kamu" type="number" name="price"
                                                id="price" autocomplete="price"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $course->price }}" required>

                                            @if ($errors->has('price'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('price') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="status"
                                                class="block mb-3 font-medium text-gray-700 text-md">Status</label>

                                            <select id="is_published" name="is_published" autocomplete="is_published"
                                                class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                required>

                                                {{-- <option>Mentor Status</option> --}}
                                                <option value=1 {{ $course->is_published == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value=0 {{ $course->is_published == 0 ? 'selected' : '' }}>
                                                    Disabled
                                                </option>


                                            </select>

                                            @if ($errors->has('is_published'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('is_published') }}
                                                </p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <div class="wrapper">
                                                <div class="image image-edit">
                                                    {{-- select image from storage --}}
                                                    {{-- <img src="{{ asset('storage/' . $course->image) }}" alt=""> --}}
                                                    <img src="{{ asset('storage/course/thumbnail/' . $course->image) }}"
                                                        id="preview" alt="{{ $course->image }}"
                                                        style="display: flex">
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

                                            <label for="thumbnail"
                                                class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm text-center">Choose
                                                File</label>

                                            <input id="thumbnail" name="thumbnail" type="file" hidden>

                                            @if ($errors->has('thumbnail'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('thumbnail') }}
                                                </p>
                                            @endif


                                            <div class="py-3 text-center ">

                                                <a href="{{ route('mentor.course.index') }}" type="button"
                                                    style="width: 45%"
                                                    class="inline-flex justify-center px-4 py-2 mr-3 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                                    onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                    Cancel
                                                </a>

                                                <button type="submit" style="width: 51%"
                                                    class="w-50 inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Are you sure want to change this data ?')">
                                                    Save Changes
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

    <script type="text/javascript">
        // add row
        $("#addAdvantagesRow").click(function() {
            var html = '';
            html +=
                '<input placeholder="Keunggulan Kamu" type="text" name="advantage_user[]" id="advantage_user" autocomplete="advantage_user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

            $('#newAdvantagesRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeAdvantagesRow', function() {
            $(this).closest('#inputFormAdvantagesRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addMateriRow").click(function() {
            var html = '';
            html +=
                '<input placeholder="Materi Bootcamp" type="text" name="materi[]" id="materi" autocomplete="materi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

            $('#newMateriRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeServicesRow', function() {
            $(this).closest('#inputFormServicesRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addServicesRow").click(function() {
            var html = '';
            html +=
                '<input placeholder="Keunggulan Service" type="text" name="advantage_service[]" id="advantage_service" autocomplete="advantage_service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

            $('#newServicesRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeServicesRow', function() {
            $(this).closest('#inputFormServicesRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addTaglineRow").click(function() {
            var html = '';
            html +=
                '<input placeholder="Keunggulan" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

            $('#newTaglineRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeTaglineRow', function() {
            $(this).closest('#inputFormTaglineRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addThumbnailRow").click(function() {
            var html = '';
            html +=
                '<input placeholder="Thumbnail" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

            $('#newThumbnailRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeThumbnailRow', function() {
            $(this).closest('#inputFormThumbnailRow').remove();
        });
    </script>
@endpush

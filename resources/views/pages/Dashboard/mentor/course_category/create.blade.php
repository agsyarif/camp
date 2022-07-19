@extends('layouts.app')

@section('title', 'Create My Categpry Course')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add Category Course
                    </h2>

                    <p class="text-sm text-gray-400">
                        Upload category for the course you provide
                    </p>

                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">
                    <a href="{{ route('mentor.categories.index') }}" class="text-gray-400">Category</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Add Category</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 -mb-6">

                                            <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul
                                                Kategori</label>

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <input placeholder="kategori Kursus" type="text" name="title" id="title"
                                                autocomplete="title"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('title') }}" required>

                                            @if ($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">

                                            <label for="slug"
                                                class="block mb-3 font-medium text-gray-700 text-md">Slug</label>

                                            <input placeholder="Samakan dengan title dan tanpa sepasi" type="text"
                                                name="slug" id="slug" autocomplete="slug"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('slug') }}" required>

                                            @if ($errors->has('slug'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                            @endif

                                        </div>
                                        {{-- <div class="col-span-6 sm:col-span-3">

                                                    <label for="thumbnail" class="block mb-3 font-medium text-gray-700 text-md">Thumbnail Bootcamp Feeds</label>

                                                    <input placeholder="Thumbnail 1" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                </div> --}}

                                        <div class="col-span-6">

                                            <label for="description"
                                                class="block mb-3 font-medium text-gray-700 text-md">Deskripsi
                                                Bootcamp</label>

                                            <textarea placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description"
                                                autocomplete="description"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                rows="4"
                                                value="{{ old('description') }}">{{ 'description' ?? '' }}</textarea>

                                            @if ($errors->has('description'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}
                                                </p>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">

                                    <a href="{{ route('mentor.course.create') }}" type="button"
                                        class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                        onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                        Cancel
                                    </a>

                                    <button type="submit"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                        onclick="return confirm('Are you sure want to submit this data ?')">
                                        Create Bootcamp
                                    </button>

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
        $("#addCourseMAterials").click(function() {
            var html = '';
            html +=
                '<input placeholder="Tambah Materi Kursus" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                '<input placeholder="Keunggulan Service" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                '<input placeholder="Keunggulan Service" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                '<input placeholder="Hal yang akan di dapatkan dari service?" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                '<input placeholder="Thumbnail 3" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

            $('#newThumbnailRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeThumbnailRow', function() {
            $(this).closest('#inputFormThumbnailRow').remove();
        });
    </script>
@endpush

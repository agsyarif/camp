@extends('layouts.app')

@section('title', 'Create My Course')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add Your Course
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
                    <a href="{{ route('mentor.course.index') }}" class="text-gray-400">My Course</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Add Your Course</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.course.store') }}" method="POST" enctype="multipart/form-data">
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
                                                value="{{ old('title') }}" required>

                                            @if ($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <div class="flex space-x-2">
                                                <select id="category" name="category_id" autocomplete="category"
                                                    class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    required>

                                                    <option>Category Bootcamp</option>

                                                    @foreach ($categories as $ctg)
                                                        @if (old('category_id') == $ctg->id)
                                                            <option value={{ $ctg->id }} selected>{{ $ctg->name }}
                                                            </option>
                                                        @else
                                                            <option value={{ $ctg->id }}>{{ $ctg->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('category_id'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('category_id') }}</p>
                                                @endif

                                                <a href="{{ route('mentor.categories.create') }}"
                                                    class="rounded-lg mt-1 p-2 flex items-center"
                                                    style="background-color: rgb(185, 185, 185)">
                                                    <svg width="20" height="20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                                                    </svg>
                                                </a>
                                                {{-- <a href="/new" class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
                                                            <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                                                              <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                                                            </svg>
                                                            New
                                                          </a> --}}
                                            </div>

                                        </div>

                                        <div class="col-span-6  sm:col-span-3">

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

                                        <div class="col-span-6 sm:col-span-3">

                                            <label for="course_level"
                                                class="block mb-3 font-medium text-gray-700 text-md">Level Kursus</label>

                                            <select id="course_level" name="course_level" autocomplete="course_level"
                                                class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                required>

                                                <option>Tingkat Kesullitan Materi Kursus</option>
                                                @foreach ($level as $lvl)
                                                    @if (old('category_id') == $lvl->id)
                                                        <option value={{ $lvl->id }} selected>{{ $lvl->name }}
                                                        </option>
                                                    @else
                                                        <option value={{ $lvl->id }}>{{ $lvl->name }}</option>
                                                    @endif
                                                @endforeach

                                            </select>

                                            @if ($errors->has('delivery_time'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('delivery_time') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">

                                            <label for="description"
                                                class="block mb-3 font-medium text-gray-700 text-md">Deskripsi
                                                Bootcamp</label>

                                            {{-- <input placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description" autocomplete="description" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('description') }}" required>

                                                    @if ($errors->has('description'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                                    @endif --}}

                                            <textarea placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description"
                                                autocomplete="description"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                rows="4" value="{{ old('description') }}">{{ 'description' ?? '' }}</textarea>

                                            @if ($errors->has('description'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}
                                                </p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">

                                            <label for="price"
                                                class="block mb-3 font-medium text-gray-700 text-md">Price</label>

                                            <input placeholder="harga kelas Bootcamp" type="number" name="price" id="price"
                                                autocomplete="price"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('price') }}" required>

                                            @if ($errors->has('price'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('price') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3 in-wrapper">

                                            <div class="wrapper">
                                                <div class="image">
                                                    <img src="" id="preview" alt="">
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

                                        <div class="col-span-6 sm:col-span-3">

                                            <a for="thumbnail" onclick="defaultBtnActive()" id="custom-btn"
                                                class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm text-center">Choose
                                                a Image</a>
                                            <input id="thumbnail" name="thumbnail" type="file" hidden>

                                            <div class="py-6 text-right">

                                                <a href="{{ route('mentor.course.index') }}" type="button"
                                                    style="width: 45%"
                                                    class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                                    onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                    Cancel
                                                </a>

                                                <button type="submit" style="width: 50%"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Are you sure want to submit this data ?')">
                                                    Create Bootcamp
                                                </button>
                                            </div>

                                        </div>

                                        {{-- <div class="col-span-6">

                                            <label for="advantage-service"
                                                class="block mb-2 font-medium text-gray-700 text-md">Chapter Kursus</label>

                                            <p class="block mb-3 text-sm text-gray-700">
                                                Materi dengan tema apa di setiap sesi pada Bootcamp ini?
                                            </p>

                                            <input placeholder="Tema 1" type="text" name="materi[]" id="materi"
                                                autocomplete="materi"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('materi[]') }}" required>

                                            <input placeholder="Teema 2" type="text" name="materi[]" id="materi"
                                                autocomplete="materi"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('materi[]') }}" required>

                                            <input placeholder="Teema 3" type="text" name="materi[]" id="materi"
                                                autocomplete="materi"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ old('materi[]') }}" required>

                                            <div id="newMateriRow"></div>

                                            <button type="button"
                                                class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                                id="addMateriRow">
                                                Tambahkan Materi +
                                            </button>

                                        </div> --}}
                                        {{-- <div class="col-span-6">

                                                    <label for="advantage-service" class="block mb-2 font-medium text-gray-700 text-md">Key Point Bootcamp</label>

                                                    <p class="block mb-3 text-sm text-gray-700">
                                                        Hal apa aja yang didapakan dari Bootcamp ini?
                                                    </p>

                                                    <input placeholder="Keunggulan Service 1" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <input placeholder="Keunggulan Service 2" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <input placeholder="Keunggulan Service 3" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <div id="newServicesRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                                        Tambahkan Keunggulan +
                                                    </button>

                                                </div> --}}

                                        {{-- <div class="col-span-6">

                                                    <label for="advantage-user" class="block mb-3 font-medium text-gray-700 text-md">Course Materials <span class="text-gray-400">(Optional)</span></label>

                                                    <input placeholder="Tambah Materi Kursus" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required> --}}

                                        {{-- <input placeholder="Detail Bootcamp 2" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required>

                                                    <input placeholder="Detail Bootcamp 3" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required> --}}
                                        {{-- <div id="newAdvantagesRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addCourseMAterials">
                                                        Tambahkan Materi +
                                                    </button>

                                                </div> --}}
                                        {{-- <div class="col-span-6">

                                                    <label for="note" class="block mb-3 font-medium text-gray-700 text-md">Note <span class="text-gray-400">(Optional)</span></label>

                                                    <input placeholder="Hal yang ingin disampaikan oleh kamu?" type="text" name="note" id="note" autocomplete="note" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('note') }}" required>

                                                    @if ($errors->has('note'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('note') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="tagline" class="block mb-3 font-medium text-gray-700 text-md">Benefits Bootcamp?
                                                        <span class="text-gray-400">(??)</span>
                                                    </label>

                                                    <input placeholder="Hal apa yang akan di dapatkan dari Bootcamp?" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('tagline') }}" required>

                                                    @if ($errors->has('tagline'))
                                                        <p class="text-red-500 mb-3 text-sm">
                                                            {{ $errors->first('tagline') }}
                                                        </p>
                                                    @endif

                                                    <div id="newTaglineRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addTaglineRow">
                                                        Tambahkan Tagline +
                                                    </button>

                                                </div> --}}

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

    {{-- <script>
        // function previewFile(input) {
        //     // var file = $("input[type=file]").get(0).files[0];
        //     let file = $("#thumbnail").get(0).files(0);
        //     if (file) {
        //         let reader = new FileReader();
        //         reader.onload = function() {
        //             $('#previewImg').attr("src", reader.result);
        //         }
        //         reader.readAsDataURL(file);
        //     }
        // }

        const fileInput = document.querySelector('input[type="file"]');
        const preview = document.querySelector('img.previewImg');
        const eventLog = document.querySelector('.event-log-contents');
        const reader = new FileReader();

        function handleEvent(event) {
            eventLog.textContent = eventLog.textContent + `${event.type}: ${event.loaded} bytes transferred\n`;

            if (event.type === "load") {
                preview.src = reader.result;
            }
        }

        function addListeners(reader) {
            reader.addEventListener('loadstart', handleEvent);
            reader.addEventListener('load', handleEvent);
            reader.addEventListener('loadend', handleEvent);
            reader.addEventListener('progress', handleEvent);
            reader.addEventListener('error', handleEvent);
            reader.addEventListener('abort', handleEvent);
        }

        function handleSelected(e) {
            eventLog.textContent = '';
            const selectedFile = fileInput.files[0];
            if (selectedFile) {
                addListeners(reader);
                reader.readAsDataURL(selectedFile);
            }
        }

        fileInput.addEventListener('change', handleSelected);
    </script> --}}

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

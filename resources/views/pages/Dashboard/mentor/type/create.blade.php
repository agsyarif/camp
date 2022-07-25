@extends('layouts.app')

@section('title', 'Add Chapter')
@section('content')

    <main class="h-full overflow-y-auto">

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.type.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class=""> --}}

                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6">
                                            <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Type</label>

                                            <input id="id_exam" name="id_exam" required value="{{ $id }}" hidden/>
                                        </div>

                                        <div class="col-span-6">

                                                <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Type</label>

                                                <input placeholder="Add Your Chapter" type="text" name="title[]" id="title" autocomplete="title" class="block w-full py-3 mt-4 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>

                                                @if ($errors->has('title'))
                                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                                @endif

                                        </div>

                                    </div>
                                    <div class="mt-4 grid grid-cols-6 gap-6" id="newServicesRow">

                                    </div>
                                </div>

                                <div class="px-4 py-3 sm:px-6">
                                    <button type="button" class="inline-flex justify-center px-3 py-2 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                        Tambahkan type +
                                    </button>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">

                                    <a href="{{ route('mentor.exam.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                        Cancel
                                    </a>

                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                        Create Type
                                    </button>
                                </div>
                            {{-- </div> --}}
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
        $("#addServicesRow").click(function() {
            var html = '';
            // html += '<div class="grid grid-cols-6"><div class="col-span-6 sm:col-span-3"><input placeholder="Add Your Chapter" type="text" name="title[]" id="title" autocomplete="title" class="block w-full py-3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>@if ($errors->has('title'))<p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>@endif</div></div>';
            html += '<div class="col-span-6">\
\
                    <input placeholder="Add Your Chapter" type="text" name="title[]" id="title" autocomplete="title" class="block w-full py-3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>\
\
                    </div>'

            $('#newServicesRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeServicesRow', function() {
            $(this).closest('#inputFormServicesRow').remove();
        });
    </script>



@endpush

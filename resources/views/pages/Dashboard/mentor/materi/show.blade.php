@extends('layouts.app')

@section('title', 'My Materi')

@section('content')

    <main class="h-full overflow-y-auto">

        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My material from <br>{{ $course->name ?? '' }}
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $chapter->count() }} Total Chapter
                    </p>
                </div>

                <div class="col-span-4 lg:text-right">
                    <div class="relative mt-0 md:mt-6">

                        <a href="{{ route('mentor.chapter.show', $course->id) }}"
                            class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                            + Add Chapter
                        </a>

                    </div>
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
                    <a href="#" class="font-medium">Chapter & Material</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">

                        <table id="table-material" class="w-full table-auto" aria-label="Table">

                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4 w-1 px-2" scope="">NO</th>
                                    <th class="py-4" scope="">Chapter</th>
                                    {{-- <th class="py-4 text-left" scope="">Add Materi</th> --}}
                                    <th class="py-4 text-center" scope="">Materi</th>
                                    {{-- <th class="py-4" scope="">video</th> --}}
                                    {{-- <th class="py-4 " scope="">Tambah Materi</th> --}}
                                    {{-- <th class="py-4" scope="">Status</th> --}}
                                    <th class="py-4 text-right" scope="">Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">

                                @forelse ($chapter as $key => $item)


                                    @if ($item->count() > 0)
                                        <tr class="text-gray-700 border-b">

                                            <td class="font-bold px-1 py-5 text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-1 py-5 text-sm">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.materi.edit', $item->id) }}"
                                                        class="font-medium text-black">
                                                        {{ $item->title ?? '' }}
                                                    </a>

                                                </div>
                                            </td>
                                            <td class="px-1 py-5 text-sm text-center">
                                                <div class="text-sm row">

                                                    {{-- {{ count($materi->where('course_lesson_id', $item->id)) }} --}}

                                                    <a href="{{ route('mentor.materi.edit', $item->id) }}"
                                                        class="font-medium text-black">
                                                        <p id="countMateri"></p>
                                                        {{ count($materi->where('course_lesson_id', $item->id)) }}
                                                    </a>

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        <a href="{{ route('mentor.create-materi.show', $item->id) }}">
                                                            <i class="fas fa-plus fa-lg"></i>
                                                        </a>
                                                    </button>




                                                </div>
                                            </td>
                                            <td class="px-1 py-5 text-sm text-right">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.chapter.edit', $item->id) }}"
                                                        class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                    </a>

                                                    <form class="inline"
                                                        action="{{ route('mentor.chapter.destroy', $item->id) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash-alt fa-lg"></i>

                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        @if ($materi->where('course_lesson_id', $item->id)->count() > 0)
                                            <tr class="text-gray-800 border-b">
                                                <td class="pl-8 py-2 text-sm text-center font-bold w-4">No
                                                </td>
                                                <td class="pl-8 py-2 text-sm font-bold">Title</td>
                                                <td class="px-1 py-2 text-sm font-bold">Video Url</td>
                                                <td class="px-1 py-2 text-sm font-bold text-center">Action</td>
                                            </tr>
                                        @endif

                                        @foreach ($materi->where('course_lesson_id', $item->id) as $m)
                                            <tr class="text-gray-700 border-b">
                                                <td class="pl-8 py-5 text-sm text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="px-8 py-5 text-sm">
                                                    <a href="{{ route('mentor.priview.show', $m->id) }}">
                                                        {{ $m->title }}
                                                    </a>
                                                </td>
                                                <td class="px-1 py-5 text-sm">
                                                    <a href="{{ route('mentor.priview.show', $m->id) }}">
                                                        {{ $m->video_url }}
                                                    </a>
                                                </td>
                                                <td class="px-1 py-5 text-sm text-center">
                                                    <div class="text-sm">
                                                        <a href="{{ route('mentor.materi.edit', $m->id) }}"
                                                            class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                            <i class="fas fa-edit fa-lg"></i>
                                                        </a>
                                                        <form class="inline"
                                                            action="{{ route('mentor.materi.destroy', $m->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash-alt fa-lg"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach


                                        {{-- table materi --}}
                                    @endif

                                @empty

                                    empty

                                @endforelse

                                {{-- @forelse ($materi as $key => $item) --}}
                                {{-- @if ($item->count() > 0) --}}
                                {{-- <tr class="text-gray-700 border-b">

                                            <td rowspan="{{ $item->count() }}" class="font-bold px-1">
                                                @for ($i = 1; $i < $key + 1; $i++)
                                                @endfor {{ $i }}
                                            </td>

                                            <td rowspan="{{ $item->count() }}" class="w-2/6 px-1">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.material.edit', $item->id) }}"
                                                        class="font-medium text-black">
                                                        {{ $item->title ?? '' }}
                                                    </a>

                                                </div>
                                            </td>

                                            <td rowspan="{{ $item->detail_material->count() }}" class="w-2/6 px-1">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.detail_material.show', $item->id) }}"
                                                        class="px-4 py-2 mt-2 text-center rounded-xl hover:bg-gray-300">
                                                        <i class="fas fa-plus"></i>
                                                    </a>

                                                </div>
                                            </td>

                                        </tr> --}}

                                {{-- <tr class="text-gray-700 border-b">

                                            @forelse ($item->detail_material as $key => $dt_detail)
                                                <td class="px-1 py-5 text-sm flex">
                                                    {{ $dt_detail->title ?? '' }}
                                                </td>
                                            @empty

                                                <td class="px-1 py-5 text-sm flex">
                                                    No Data
                                                </td>
                                            @endforelse

                                            <td class="row text-sm text-center">
                                                @forelse ($item->detail_material as $key => $dt_detail)
                                                    <div class="aksi mb-4">
                                                        <a href="{{ route('mentor.detail_material.edit', $dt_detail->id) }}"
                                                            class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                            <i class="fas fa-edit fa-lg"></i>

                                                        </a>

                                                        <form class="inline"
                                                            action="{{ route('mentor.detail_material.destroy', $dt_detail->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class=" py-2 mt-2 text-red-500 hover:text-gray-800"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash-alt fa-lg"></i>

                                                            </button>
                                                        </form>
                                                    </div>
                                                @empty
                                                    No Data
                                                @endforelse


                                            </td>

                                        </tr> --}}
                                {{-- @else --}}
                                {{-- <tr class="text-gray-700 border-b">

                                            <td class="font-bold px-1">
                                                @for ($i = 1; $i < $key + 1; $i++)
                                                @endfor {{ $i }}
                                            </td>

                                            <td class="w-2/6 px-1 py-5">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.material.edit', $item->id) }}"
                                                        class="font-medium text-black">
                                                        {{ $item->title ?? '' }}
                                                    </a>

                                                </div>
                                            </td>

                                            <td class="w-2/6 px-1">
                                                <div class="text-sm">

                                                    <a href="{{ route('mentor.detail_material.show', $item->id) }}"
                                                        class="px-4 py-2 mt-2 text-center rounded-xl hover:bg-gray-300">
                                                        <i class="fas fa-plus"></i>
                                                    </a>

                                                </div>
                                            </td>

                                            <td class="text-sm px-1 py-5">
                                                No Data
                                            </td>

                                            <td class="text-sm text-center px-1 py-5">
                                                No Data
                                            </td>

                                        </tr> --}}
                                {{-- @endif --}}

                                {{-- @empty
                                    No Data
                                @endforelse --}}



                            </tbody>
                        </table>

                    </div>
                </main>
            </div>
        </section>

    </main>

    {{-- @else

        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Requests Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven’t provided any Materi. <br>
                    Let’s create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="#" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Materi
                    </a>
                </div>
            </div>
        </div>

    @endif --}}

@endsection

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-material').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }]
            });
        });
    </script>
@endpush

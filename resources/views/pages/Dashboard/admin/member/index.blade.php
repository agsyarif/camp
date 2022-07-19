@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <main class="h-full overflow-y-auto">

        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My Member
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $member->count() ?? '' }} Total Member
                    </p>
                </div>

                <div class="col-span-4 lg:text-right">
                    <div class="relative mt-0 md:mt-6">
                        <a href="{{ route('admin.member-management.create') }}"
                            class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                            + Add Member
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                        <table class="w-full" aria-label="Table">

                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope="">Name</th>
                                    <th class="py-4" scope="">Email</th>
                                    <th class="py-4" scope="">Course</th>
                                    <th class="py-4" scope="">Webinar</th>
                                    <th class="py-4" scope="">Status</th>
                                    <th class="py-4" scope="">Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">

                                @forelse ($member as $key => $men)
                                    <tr class="text-gray-700 border-b">
                                        <td class="w-2 px-1 py-5">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                    @if ($men->profile_photo_path != null)
                                                        <img class="object-cover w-full h-full rounded"
                                                            src="{{ url($men->profile_photo_path) }}" alt="thumbnail"
                                                            loading="lazy" />
                                                    @else
                                                        <img class="object-cover w-full h-full rounded"
                                                            src="{{ url('https://randomuser.me/api/portraits/men/3.jpg') }}"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    @endif

                                                </div>

                                                <div>

                                                    {{-- <a href="{{ route('admin.member.show', $men->id) }}"
                                                        class="font-medium text-black">
                                                        {{ $men->name ?? '' }}
                                                    </a> --}}
                                                    <a href="#" class="font-medium text-black">
                                                        {{ $men->name ?? '' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-1 py-5 text-sm">
                                            {{ $men->email ?? '-' }}
                                        </td>

                                        <td class="px-1 py-5 text-sm">
                                            {{ $men->skill_id ?? '-' }}
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            {{ $men->skill_id ?? '-' }}
                                        </td>

                                        <td class="px-1 py-5 text-sm text-green-500 text-md">
                                            @if ($men->is_active == 1)
                                                {{-- {{ $men->status ?? '' }} --}}
                                                <p class="text-grey-800">Active</p>
                                            @else
                                                <p class="text-red-500">Non Active
                                                <p>
                                            @endif
                                        </td>


                                        <td class="py-5 text-sm flex">
                                            {{-- {{ route('admin.member.show', $men['id']) }} --}}
                                            <a href="{{ route('admin.member-management.show', $men['id']) }}"
                                                class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            {{-- {{ route('admin.member.edit', $men['id']) }} --}}
                                            <a href="{{ route('admin.member-management.edit', $men['id']) }}"
                                                class="px-2 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                                {{-- <img src="{{ asset('assets/images/edit.png') }}" alt="" --}}
                                                {{-- class="w-6 h-6"> --}}
                                            </a>
                                            {{-- {{ route('admin.member.destroy', $men->id) }} --}}
                                            <form action="{{ route('admin.member-management.destroy', $men->id) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="py-2 mt-2 text-red-500 hover:text-gray-800"
                                                    onclick="return confirm('Are you sure?')">
                                                    {{-- <img src="{{ asset('assets/images/trash.png') }}" alt="" --}}
                                                    {{-- class="w-6 h-6"> --}}
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection

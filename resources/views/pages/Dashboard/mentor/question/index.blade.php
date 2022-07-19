@extends('layouts.app')

@section('title', 'Add Chapter')
@section('content')

    <main class="h-full overflow-y-auto">

        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Question From {{ $exam->title }}
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $question->count() }} Total Question
                    </p>
                </div>

                <div class="col-span-4 lg:text-right">
                    <div class="relative mt-0 md:mt-6">
                        <a href="{{ route('mentor.question.show', [$exam->id]) }}"
                            class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                            + Add Question
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
                                    <th class="py-4" scope="">Chapter</th>
                                    <th class="py-4 px-11 " scope="">Type</th>
                                    <th class="py-4" scope="">Duration</th>
                                    <th class="py-4" scope="">Total Question</th>
                                    <th class="py-4 text-center" scope="">Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @if ($question->count() > 0)

                                    @forelse($question as $key => $q)
                                        <tr class="text-gray-700 border-b">

                                            <td class="text-center py-5">
                                                {{ $key + 1 }}
                                            </td>

                                            <td class="px-1 py-5 text-md">
                                                {{ $q->title }}
                                            </td>

                                            <td class="px-1 py-5 text-md">
                                                {{-- {{ $chapter->where('id', $q->chapter_id)->first()->title }} --}}
                                            </td>

                                            <td class="px-11 py-5 text md">
                                                {{ $type->where('id', $q->type_id)->first()->name }}
                                            </td>

                                            <td class="px-1 py-5 text-md">
                                                {{ $q->answer }}
                                            </td>

                                            <td class="px-1 py-5 text-md">
                                                {{ $q->option1 }} : {{ $q->option2 }} :
                                                {{ $q->option3 }} : {{ $q->option4 }}
                                            </td>

                                            <td class="px-1 text-sm text-center">

                                                <a href="{{ route('mentor.question.edit', [$q->id]) }}"
                                                    class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>

                                                <form class="inline"
                                                    action="{{ route('mentor.question.destroy', [$q->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>

                                                    </button>
                                                </form>
                                            </td>
                                            {{-- <td class="font-bold text-center">
                                        <a href="{{ route('mentor.exam.edit', $exam->id) }}"
                                            class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                            Edit
                                        </a>
                                        <a href="{{ route('mentor.exam.delete', $exam->id) }}"
                                            class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                            Delete
                                        </a>
                                    </td> --}}
                                        </tr>
                                    @empty
                                    @endforelse

                                @endif
                            </tbody>
                        </table>

                    </div>
                </main>
            </div>
        </section>

    </main>

@endsection

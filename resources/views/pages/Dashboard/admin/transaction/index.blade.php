@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <main class="h-full overflow-y-auto">

        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Transaksi
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $transactions->count() ?? '' }} Total Transaksi
                    </p>
                </div>

            </div>

            <section class="container px-6 mx-auto mt-5">
                <div class="grid gap-5 md:grid-cols-12">
                    <main class="col-span-12 p-4 md:pt-0">
                        <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                            <table class="w-full" aria-label="Table">

                                <thead>
                                    <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                        <th class="py-4" scope="">No</th>
                                        <th class="py-4" scope="">Code</th>
                                        <th class="py-4" scope="">User</th>
                                        <th class="py-4" scope="">Course</th>
                                        <th class="py-4" scope="">Price</th>
                                        <th class="py-4" scope="">Status</th>
                                        <th class="py-4" scope="">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">

                                    @forelse ($transactions as $key => $men)
                                        <tr class="text-gray-700 border-b">

                                            <td class="px-1 py-5 text-sm">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ $men->midtrans_booking_code ?? '-' }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ $men->user->name ?? '-' }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ $men->course->name ?? '-' }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                {{ $men->course->price ?? '-' }}
                                            </td>

                                            <td class="px-1 py-5 text-sm">
                                                @if ($men->payment_status == 'pending')
                                                    <span class="text-red-400">
                                                        {{ $men->payment_status ?? '-' }}
                                                    </span>
                                                @elseif($men->payment_status == 'paid')
                                                    <span class="text-green-400">
                                                        {{ $men->payment_status ?? '-' }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="py-5 text-sm flex">

                                                <a href="{{ route('admin.transaction.edit', $men['id']) }}"
                                                    class="px-2 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                    <i class="fa-regular fa-pen-to-square"></i>

                                                </a>

                                                <form action="{{ route('admin.transaction.destroy', $men->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="py-2 mt-2 text-red-500 hover:text-gray-800"
                                                        onclick="return confirm('Are you sure?')">

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

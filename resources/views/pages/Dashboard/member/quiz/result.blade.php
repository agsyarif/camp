@extends('layouts.learning.app')

@section('title', 'Detail Order')
@section('content')


    <div id="lesson">
        <div class="container-fluid bg-dark">
            <div class="container-fluid row col-sm-12 p-4">

                <aside class="col-sm-3 p-3 nav-bg" style="border-radius: 20px;">
                    <div class="d-flex justify-content-between" style="align-items: center;">
                        <img src="https://class.buildwithangga.com/images/ic_burger-opened.svg" alt="">
                        <a href="{{ route('member.dashboard.index') }}"
                            style="color: darkgray; text-decoration: none; margin-right:20px;">Dashboard</a>
                    </div>
                    <div class="flex mb-4">
                        {{-- <h5 class="mt-3 d-inline-block">Dark Mode</h5>
                        <input type="checkbox" class="" name="" id=""> --}}
                    </div>

                    <nav class="sidebar py-2 mb-4 nav-bg">
                        <ul class="nav flex-column" id="nav_accordion">
                            @foreach ($chapter as $key => $item)
                                <li class="nav-item has-submenu rounded-pill mb-2">
                                    <a class="nav-link white hover rounded-pill d-flex justify-content-between"
                                        href="#">
                                        <span>{{ $item->title }}</span>
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <ul class="submenu collapse">
                                        @foreach ($material as $key => $m)
                                            @if ($m->course_lesson_id == $item->id)
                                                <li>

                                                    <a class="nav-link white hover rounded-pill mb-1 mt-2 d-flex justify-content-between"
                                                        href="{{ route('member.course.materi', [$m->id]) }}">
                                                        <i class="bi bi-play-circle px-2"></i> {{ $m->title }}
                                                        <i class="bi bi-check2-circle ml-auto text-primary "></i>
                                                    </a>

                                                </li>
                                            @endif
                                        @endforeach
                                        @foreach ($exam as $key => $e)
                                            @if ($e->course_lesson_id == $item->id)
                                                <li>
                                                    <a class="nav-link white hover rounded-pill mb-1 mt-2 d-flex justify-content-between"
                                                        href="{{ route('member.course.quiz', [$e->id]) }}">
                                                        <i class="fa-solid fa-clipboard-question mx-2"></i>
                                                        {{ $e->title }}
                                                        <i class="bi bi-check2-circle ml-auto text-primary "></i>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </nav>


                </aside>
                <div class="col-sm-9">

                    <div class="section-body">
                        <div class="mb-4">
                            <div class="card nav-bg" style="border-radius: 20px">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12  text-white mt-3">
                                            <p>
                                                <i class="fa-solid fa-clipboard-question mx-2"></i>
                                                {{ $examActive->title }}
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <!-- Display the countdown timer in an element -->
                                            <span class="badge badge-danger" id="timer"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="color: darkgrey">
                                        <p>Ujian dengan Judul {{ $examActive->title }} untuk menguji materi pada bab :
                                        </p>
                                        <p>{{ $chapterActive->title }}</p>
                                        {{-- {{ $examActive }} --}}
                                        <p>Score : {{ $score }}</p>
                                        @if ($score < 100)
                                            <p>Anda tidak lulus ujian pada bab ini. silahkan belajar lagi.</p>
                                        @else
                                            <p>Anda lulus pada ujian bab ini. Silahkan lanjutkan belajar.</p>
                                        @endif
                                    </div>

                                </div>
                                {{-- @livewire('quiz', [$id]) --}}
                                {{-- @livewire('counter', [$id]) --}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between p-4">
                        <div class="">
                            <p class="white" style="color: darkgrey">Ujian Bab : {{ $chapterActive->title }}
                            </p>
                        </div>
                        <span class="d-flex">
                            <a class="white hover p-2 nav-bg rounded-pill" style="height: 40px" href="#">
                                {{-- {{ route('member.course.materi', [$MateriActive[0]->id + 1]) }} --}}
                                Next Video
                            </a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

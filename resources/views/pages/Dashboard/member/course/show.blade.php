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
                                                @if ($m->id == 1)
                                                    <li>

                                                        <a class="nav-link white hover rounded-pill mb-1 mt-2 d-flex justify-content-between"
                                                            href="{{ route('member.course.show', [$item->course_id]) }}">
                                                            <i class="bi bi-play-circle px-2"></i> {{ $m->title }}
                                                            <i class="bi bi-check2-circle ml-auto text-primary "></i>
                                                        </a>

                                                    </li>
                                                @else
                                                    <li>

                                                        <a class="nav-link white hover rounded-pill mb-1 mt-2 d-flex justify-content-between"
                                                            href="{{ route('member.course.materi', [$m->id]) }}">
                                                            <i class="bi bi-play-circle px-2"></i> {{ $m->title }}
                                                            <i class="bi bi-check2-circle ml-auto text-primary "></i>
                                                        </a>

                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        {{-- @if ($exam->count() > 0) --}}
                                        @foreach ($exam as $key => $e)
                                            @if ($e->course_lesson_id == $item->id)
                                                <li>
                                                    <a class="nav-link white hover rounded-pill mb-1 mt-2 d-flex justify-content-between"
                                                        href="{{ route('member.course.quiz', [$e->id]) }}">
                                                        <i class="bi bi-play-circle px-2"></i> {{ $exam[0]->title }}
                                                        <i class="bi bi-check2-circle ml-auto text-primary "></i>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                        {{-- @endif --}}
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </nav>


                </aside>

                <div class="col-sm-9">
                    {{-- play vieo full width --}}

                    <div class="mb-4">
                        <video id="preview" style="border-radius: 20px" class="w-full ml-3 h-auto rounded-fill" controls>
                            <source id="video"
                                src="{{ asset('images/video/courses/' . $MateriActive[0]->video_url) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="d-flex justify-content-between p-4">
                        <div class="">
                            <h5 class="white" style="color: darkgrey">{{ $MateriActive[0]->title }}</h5>
                            <p class="white" style="color: darkgrey">Materi Bab : {{ $ChapterActive[0]->title }}
                            </p>
                        </div>
                        <span class="d-flex">
                            {{-- <a class="white hover p-2 bg-secondary rounded-pill" href="#">
                                Preview Video
                            </a> --}}
                            <a class="white hover p-2 nav-bg rounded-pill" style="height: 40px"
                                href="{{ route('member.course.materi', [$MateriActive[0]->id + 1]) }}">
                                Next Video
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        window.learning = function(ev) {
            console.log(ev);
            var video = document.getElementById('video');
            url = 'assets/video/courses/' + ev;
            console.log(url);
            return video.src = url;
            // return video.src = url;
        };

        // function learning() {
        //     var id = $(this).data('id');
        //     video.src = id;
        //     video.load();
        //     video.play();
        // }

        // function learning() {
        //     var video = document.getElementById('preview');
        // var url = $(this).data('id');
        // console.log(url);
        // video.src = url;
        // video.play();

        // var id = $(this).data('id');
        // console.log(id);
        // var preview = document.getElementById('preview');
        // preview.src = {{ asset('assets/video/courses/') }} ' + ' / ' + id + '.mp4 ';
        // }

        // function learning() {
        //     var id = $(this).data('id');
        //     console.log(id);
        //     var preview = document.getElementById('preview');
        //     preview.src = {{ asset('assets/video/courses/') }} ' + ' / ' + id + '.mp4 ';
        // }
    </script>
@endpush

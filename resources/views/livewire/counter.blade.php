<div class="">


    {{-- @foreach ($questions as $question)
        <div class="form-check">
            <button wire:click="answers({{ $question->id }}, '{{ $question->option1 }}')"
                class="btn btn-primary">{{ $question->option1 }}</button>
        </div>
        <div class="form-check">
            <button wire:click="answers({{ $question->id }}, '{{ $question->option2 }}')"
                class="btn btn-primary">{{ $question->option2 }}</button>
        </div>
        <div class="form-check">
            <button wire:click="answers({{ $question->id }}, '{{ $question->option3 }}')"
                class="btn btn-primary rounded-full">C</button>
            <p>{{ $question->option3 }}</p>
        </div>
        <div class="form-check">
            <button wire:click="answers({{ $question->id }}, '{{ $question->option4 }}')"
                class="btn btn-primary">{{ $question->option4 }}</button>
        </div>
        <br>
        <br>
    @endforeach --}}

    {{-- @foreach ($questions as $question)
        <div class="card-body">
            <div style="color: darkgrey">
                <b>Soal No. {{ $question->id }}</b>
                <p>{{ $question->title }}</p>
                <i>Pilih salah satu jawaban dibawah ini:</i>
                <br>
                <br>
            </div>
            <div class="form-check">
                <button wire:click="answers({{ $question->id }}, '{{ $question->option1 }}')" class="btn bg-dark "
                    data-mdb-ripple="true" data-mdb-ripple-color="light" style="color: darkgrey; size: 10px">a
                </button>
                <label class="form-check-label" style="color: darkgray;" for="{{ $question->id }}">
                    {{ $question->option1 }}
                </label>
            </div>
            <div class="form-check">
                <button wire:click="answers({{ $question->id }}, '{{ $question->option2 }}')" class="btn bg-dark"
                    style="color: darkgrey">b
                </button>
                <label class="form-check-label" style="color: darkgrey" for="{{ $question->id }}">
                    {{ $question->option2 }}
                </label>
            </div>
            <div class="form-check">
                <button wire:click="answers({{ $question->id }}, '{{ $question->option3 }}')" class="btn bg-dark"
                    style="color: darkgrey">c
                </button>
                <label class="form-check-label" style="color: darkgrey" for="{{ $question->id }}">
                    {{ $question->option3 }}
                </label>
            </div>
            <div class="form-check">
                <button wire:click="answers({{ $question->id }}, '{{ $question->option4 }}')" class="btn bg-dark"
                    style="color: darkgrey">d
                </button>
                <label class="form-check-label" style="color: darkgrey" for="{{ $question->id }}">
                    {{ $question->option4 }}
                </label>
            </div>

            <br>
            <br>



        </div>
    @endforeach --}}

    {{-- <div class="card-footer">
        @if ($questions->currentPage() == $questions->lastPage())
            <button wire:click="submitAnswer" class="btn btn-primary btn-lg btn-block">Submit</button>
        @endif
    </div> --}}

    {{-- <p>{{ $questions->links('pagination-link') }}</p> --}}
    {{-- radio --}}

    {{-- <div>
        @forelse ($jawaban as $item)
            <p>{{ $item }}</p>
        @empty
        @endforelse
    </div>
    <div>
        @forelse ($selectedAnswer as $item)
            <p>{{ $item }}</p>
        @empty
            <p>No data</p>
        @endforelse
    </div>

    <div>
        <p>The color is: {{ $color }}</p>
        <p>score {{ $score }}</p>
        <p>bo ot
            {{ $bobot }}
        </p>
    </div> --}}

    {{-- chart --}}
    <div id="chart"></div>

    <div>
        {{ $user_id }}
        {{ $category }}
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- chart --}}

</div>

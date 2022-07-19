<div>
    {{-- <div class="card nav-bg" style="border-radius: 20px">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4><i class="fas fa-exam"></i></h4>
            </div>
            <div class="col-12">
                <!-- Display the countdown timer in an element -->
                <span class="badge badge-danger" id="timer"></span>
            </div>
        </div>
    </div> --}}
    @foreach ($questions as $question)
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
    @endforeach

    <div class="d-flex justify-content-center">
        {{-- {{ $questions->links('custom-pagination') }} --}}
        {{ $questions->links() }}

    </div>
    <div class="card-footer">
        @if ($questions->currentPage() == $questions->lastPage())
            <button wire:click="submitAnswer"
                class="btn btn-primary btn-md d-flex justify-content-right">Submit</button>
        @else
            <button wire:click="submitAnswer" class="btn btn-primary btn-md d-flex justify-content-left"
                disabled>Submit</button>
        @endif
    </div>
    {{-- </div> --}}

</div>

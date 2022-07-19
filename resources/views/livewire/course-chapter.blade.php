<div class="grid grid-cols-6 gap-6">

    <div class="col-span-6 sm:col-span-3">

        <div class="flex space-x-2">
            <select id="c" name="c" autocomplete="c"
                class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:click="selectCourse($event.target.value)" required>

                <option>-- Course --</option>
                @foreach ($course as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach

            </select>

            @if ($errors->has('course_id'))
                <p class="text-red-500
                mb-3 text-sm">
                    {{ $errors->first('course_id') }}</p>
            @endif

        </div>

    </div>

    <div class="col-span-6 sm:col-span-3">

        <div class="flex space-x-2">
            <select id="course" name="course_id" autocomplete="course"
                class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                wire:click="selectChapter($event.target.value)" required>

                <option selected disabled value="">-- Chapter --</option>
                @foreach ($chapter as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach

            </select>

            @if ($errors->has('course_id'))
                <p class="text-red-500 mb-3 text-sm">
                    {{ $errors->first('course_id') }}</p>
            @endif
        </div>

    </div>

    {{-- label judul & duration --}}
    <div class="col-span-6  sm:col-span-3 -mb-6">

        <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul
            Exam</label>

    </div>
    <div class="col-span-6  sm:col-span-3 -mb-6">
        <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Duration</label>
    </div>

    {{-- input judul & duration --}}
    <div class="col-span-6  sm:col-span-3">
        {{-- <p>{{ $title }}</p> --}}
        <input placeholder="judul / tema ujian anda?" type="text" name="title" id="title" autocomplete="title"
            class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
            value="{{ old('title') }}" wire:model="title" required>

        @if ($errors->has('title'))
            <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
        @endif

    </div>
    <div class="col-span-6  sm:col-span-3">
        {{-- <p>{{ $duration }}</p> --}}
        <input placeholder="Durasi Mengerjakan Soal" type="number" name="duration" id="duration"
            autocomplete="duration"
            class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
            value="{{ old('duration') }}" wire:model="duration" required>

        @if ($errors->has('duration'))
            <p class="text-red-500 mb-3 text-sm">{{ $errors->first('duration') }}</p>
        @endif

    </div>

    <div class="col-span-6">

        <div class="py-6 text-right">

            <a href="{{ route('mentor.exam.index') }}" type="button"
                class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                Cancel
            </a>

            <button
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                wire:click="submit">
                Create Bootcamp
            </button>

            {{-- <button type="submit"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                onclick="return confirm('Are you sure want to submit this data ?')">
                Create Bootcamp
            </button> --}}
        </div>

    </div>
</div>

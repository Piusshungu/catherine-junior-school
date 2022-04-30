<x-sidebar />


<link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet"/>

<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

            @if (session()->has('success'))

            <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl text-sm flex">

                <p>{{ session('success') }}</p>
            </div>
            @endif


            @if (session()->has('error'))

            <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-red-500 text-white py-2 px-4 rounded-xl text-sm flex">

                <p>{{ session('error') }}</p>
            </div>
            @endif

            <div class="w-full border-b-4 border-yellow-400"></div>

            <table class="min-w-full">


                <thead>
                    <tr>

                        <th class="px-6 py-6 font-bold text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Create Subjects</th>
                    </tr>
                </thead>

            </table>

            <form method="POST" action="/subjects">
                @csrf

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subject_name">
                            Subject Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 -mx-3 leading-tight focus:outline-none focus:bg-white" id="subject_name" name="subject_name" type="text" placeholder="Subject Name">
                        <p class="text-gray-500 text-xs italic">Subject Name eg. Mathematics</p>

                        @error('subject_name')
                        <p class="text-red-500 text-xs mt-2 mx-4">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="block mt-12 grid grid-cols-4">

                @foreach($levels as $level)

               
                    <div class="mt-6 mx-6 col gap-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="{{ $level->id }}" class="w-6 h-6 rounded" name="levels[]" />
                            <span class="ml-2">{{ $level->class }} {{ $level->stream }}</span>
                        </label>
                    </div>

                @endforeach

                </div>

                @error('levels')
                <p class="text-red-500 text-xs mt-2 mx-10">{{ $message }}</p>
                @enderror


                <div class="py-3 center mx-auto">

                    <button type="submit" class=" mt-10 ml-10 block w- 55 border border-yellow-500 text-gray mb-8 flex hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Submit</button>

                </div>

            </form>
        </div>
    </div>
<x-sidebar />


<link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet" />

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


            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <a href="/subjects" class="text-lg text-xs  tracking-widest rounded-lg focus:outline-none focus:shadow-outline">Back
                    </a>
                    <button class="md:hidden rounded-lg text-xs focus:outline-none focus:shadow-outline mx-2" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="w-full border-b-4 border-yellow-400"></div>

            <table class="min-w-full">


                <thead>
                    <tr>

                        <th class="px-6 py-6 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Create New Subject</th>
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
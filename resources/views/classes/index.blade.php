<x-sidebar />

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

            @if (session()->has('success'))

            <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl text-sm flex">

                <p>{{ session('success') }}</p>
            </div>
            @endif

            <div class="w-full border-b-4 border-yellow-400"></div>

            <table class="min-w-full">


                <thead>
                    <tr>

                        <th class="px-6 py-3 font-bold text-xs font-medium leading-4 tracking-wider text-center text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
                        </th>
                    </tr>
                </thead>

            </table>

            <div class="p-10 h-50">

                <div class=" w-full h-40 lg:max-w-full lg:flex">

                    <img class="w-40 h-40 rounded-full mr-4" src="/images/classroom.jpg" alt="">

                    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-gray-200 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="mt-mt-12 text-sm text-gray-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                List of Available Classes
                            </p><br>

                            <div class="mt-mt-12 text-gray-900 font-bold text-xl mb-2">{{ date('Y')}} Classes</div>
                            <p class="mt-mt-12 text-gray-700 text-base w-240">This is the list of all classes in Catherine Juniuor School (CJS) with their respective streams. Each Class is subjected to its Teacher. </p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-2 gap-2">

        <div class="col">

            <div class="lg:inline-flex items-center rounded-full px-12 py-4 mt-2 ml-0">

                <form method="GET" action="/parents">

                    @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <input type="search" value="{{ request('search') }}" name="search" class="rounded-full form-control relative flex-auto min-w-0 block w-80 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">

                </form>
            </div>
        </div>

        <div class="col">

            <a href="/class/create" class="border border-yellow-400 ml-80 mt-6 block w-40 text-black mb-8 flex bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create New Class</a>

        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 mx-6">

        @foreach($classes as $class)

        <div class="container my-12 mx-auto mt-1 mx-4">

            <div class="flex flex-wrap">

                <!-- Column -->
                <div class="my-1 px-1 w-full lg:my-4 lg:px-4">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg h-40 bg-gray-200 mt-0 border border-yellow-600 hover:bg-gray-100">

                        <a href="#">

                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-black" href="#">
                                    {{ $class->class}} {{ $class->stream}}
                                </a>
                            </h1>
                            <p class="text-grey-darker text-sm">
                                {{ $class->created_at }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-black" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>

                                <p class="ml-2 text-sm">
                                    {{ $class->user->first_name }} {{ $class->user->last_name }}
                                </p>

                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                <span class="hidden">Edit</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </footer>



                    </article>
                    <!-- END Article -->

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
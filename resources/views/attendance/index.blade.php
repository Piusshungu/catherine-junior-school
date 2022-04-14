<x-sidebar />

<style>
    input:checked~.present {
        transform: translateX(100%);

        background-color: #48bb78;
    }

    input:checked~.absent {
        transform: translateX(100%);

        background-color: red;
    }
</style>
<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">


            <div class="grid grid-cols-3 gap-">

                <div class="col">

                    @can('Can Create Parent')

                    <x-create-student-button />

                    @endcan

                </div>

                <div class="col">
                    <div class="lg:inline-flex items-center rounded-full px-0 py-2 mt-2 ml-40">
                        <form method="GET" action="/students">

                            @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif

                            <input type="search" value="{{ request('search') }}" name="search" class="rounded-full form-control relative flex-auto min-w-0 block w-80 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">

                        </form>
                    </div>
                </div>

            </div>


            @if (session()->has('success'))

            <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl text-sm flex">

                <p>{{ session('success') }}</p>
            </div>
            @endif

            <div class="w-full border-b-4 border-yellow-400"></div>

            <table class="min-w-full">


                <thead>
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Reg. Number</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Date of Birth</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Present</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Absent</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Permitted</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    <tr>
                        @php

                        $i = 1;

                        @endphp

                        @foreach($students as $student)


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    {{ $i++ }}
                                </div>
                                {{ ucwords( strtolower($student->name)) }}
                                <div class="ml-4">
                                    <div class="text-sm font-medium leading-5 text-gray-900">

                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $student->registration_number }}</div>

                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $student->dob }}</div>

                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                            <div class="flex items-center justify-center w-full mb-8">

                                <label for="toggleB" class="flex items-center cursor-pointer">
                                    <!-- toggle -->
                                    <div class="relative">
                                        <!-- input -->
                                        <input type="checkbox" id="toggleB" class="sr-only">
                                        <!-- line -->
                                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                                        <!-- dot -->
                                        <div class="present absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                                    </div>
                                    <!-- label -->

                                </label>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            <div class="flex items-center justify-center w-full mb-8">

                                <label for="toggleB" class="flex items-center cursor-pointer">
                                    <!-- toggle -->
                                    <div class="relative">
                                        <!-- input -->
                                        <input type="checkbox" id="toggleB" class="sr-only">
                                        <!-- line -->
                                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                                        <!-- dot -->
                                        <div class="absent absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                                    </div>
                                    <!-- label -->

                                </label>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            <div class="flex items-center justify-center w-full mb-8">

                                <label for="toggleB" class="flex items-center cursor-pointer">
                                    <!-- toggle -->
                                    <div class="relative">
                                        <!-- input -->
                                        <input type="checkbox" id="toggleB" class="sr-only">
                                        <!-- line -->
                                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                                        <!-- dot -->
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                                    </div>
                                    <!-- label -->

                                </label>

                            </div>
                        </td>

                    </tr>

                    <tr>

                    </tr>
                    @endforeach

                </tbody>


            </table>
            <button type="submit" class=" mt-10 ml-10 block w- 55 border border-yellow-500 text-gray mb-8 flex hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Submit Attendance</button>

            {{ $students->links() }}
        </div>
    </div>
</div>


<script type="text/javascript">
    function deleteConfirmation() {

        return confirm('Are you sure you want to delete this student?');
    }
</script>


<script type="text/javascript">
    function dropDown(dropdown) {

        document.getElementById(dropdown).classList.toggle("hidden");

        document.getElementById(dropdown).classList.toggle("flex");

    }
</script>
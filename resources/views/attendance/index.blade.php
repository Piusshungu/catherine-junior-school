<x-sidebar />

<style>
    input:checked~.present {
        transform: translateX(100%);

        background-color: #48bb78;
    }

    input:checked~.absent {
        transform: translateX(100%);

        background-color: #E74C3C;
    }

    input:checked~.permitted {
        transform: translateX(100%);

        background-color: #F4D03F;
    }
</style>
<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

        <form method="POST" action="/attendance">
             @csrf
            <div class="grid grid-cols-3 gap-">

                <div class="col">

                    @can('Can Create Parent')

                    <div class="relative mt-4 mb-10 ml-8">

                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker type="text" value="date" name="date" class="bg-gray-50 border border-yellow-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full pl-10 p-2.5 dark:bg-gray-500 dark:border-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-300 dark:focus:border-blue-300" placeholder="Select date">
                    </div>

                    @endcan

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

                                    <label for="{{ $student->id }}" class="flex items-center cursor-pointer">
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input type="checkbox" id="{{ $student->id }}" class="sr-only" name="attendences[{{$loop->index}}][status]" value="Present">
                                            <input type="hidden" name="attendences[{{$loop->index}}][student_id]" value="{{$student->id}}">
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

                                    <label for="absent_{{ $student->id }}" class="flex items-center cursor-pointer">
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input type="checkbox" id="absent_{{ $student->id }}" class="sr-only" name="attendences[{{$loop->index}}][status]" value="Absent">

                                            <input type="hidden" name="attendences[{{$loop->index}}][student_id]" value="{{$student->id}}">
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

                                    <label for="permitted_{{ $student->id }}" class="flex items-center cursor-pointer">
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input type="checkbox" id="permitted_{{ $student->id }}" class="sr-only" name="attendences[{{$loop->index}}][status]" value="Permitted">

                                            <input type="hidden" name="attendences[{{$loop->index}}][student_id]" value="{{$student->id}}">
                                            <!-- line -->
                                            <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                                            <!-- dot -->
                                            <div class="permitted absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
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
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    function dropDown(dropdown) {

        document.getElementById(dropdown).classList.toggle("hidden");

        document.getElementById(dropdown).classList.toggle("flex");

    }
</script>
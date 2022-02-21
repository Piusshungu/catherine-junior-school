<x-sidebar />


<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">
            

            <div class="grid grid-cols-2 gap-">

                <div class="col">

                    @can('Can Create Parent')

                    <x-create-student-button />

                    @endcan

                </div>

                <div class="col">
                    <div class="lg:inline-flex items-center rounded-full px-12 py-2 mt-2 ml-28">
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
                            Status</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            View</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Delete</th>
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
                                {{ ucwords( strtolower($student->full_name)) }}
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
                            <span class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-white bg-green-500 rounded-full py-2.5 px-5 mr-2 mb-2 text-sm font-small text-white bg-green-500 rounded-full  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">Active</span>
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a href="#" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-gray-900 border border-yellow-500  rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 rounded-full  hover:bg-yellow-400 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">View</a>
                        
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a href="/deleteStudent/{{ $student->id }}" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-red-500 rounded-full hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-50 border border-red-500 focus: dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>

                    </tr>

                    <tr>

                    </tr>
                    @endforeach

                </tbody>


            </table>
            {{ $students->links() }}
        </div>
    </div>
</div>


<script type="text/javascript">
    
    function deleteConfirmation() {
        
        return confirm('Are you sure you want to delete this student?');
    }
</script>
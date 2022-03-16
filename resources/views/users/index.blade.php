<x-sidebar />

<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="nline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

            <div class="grid grid-cols-3 gap-">

                <div class="col">

                    @can('Can Create Parent')

                    <a href="/users/create" class="ml-10 mt-4 block w-40 text-white mb-8 flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create New User</a>

                    @endcan

                </div>

                <div class="col">
                    <div class="lg:inline-flex items-center rounded-full px-52 py-2 mt-2 ml-0">
                        <form method="GET" action="/users">

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
                            Role</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Email Address</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Phone Number</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            View</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Edit</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Delete</th>
                    </tr>
                </thead>

                <tbody class="bg-white text-sm">
                    <tr>
                        @php

                        $i = 1;

                        @endphp

                        @foreach($users as $user)


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm">
                            <div class="flex items-center text-sm">
                                <div class="flex-shrink-0 w-10 h-10 text-sm">
                                    {{ $i++ }}
                                </div>
                                {{ ucwords( strtolower($user->first_name)) }} {{ ucwords( strtolower($user->last_name)) }}
                                <div class="ml-4">
                                    <div class="text-sm font-small leading-5 text-gray-900">

                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $user->type }}</div>

                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $user->email }}</div>

                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{ $user->phone_number }}</div>

                        </td>


                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can View Parents List')

                            <a href="/user/{{ $user->id }}/profile" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-gray-900 border border-yellow-500  rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 rounded-full  hover:bg-yellow-400 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">View</a>

                            @endcan
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can Edit Parent(s) Details')

                            <a href="#" class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-white bg-green-500 rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small bg-green-500 rounded-full  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">Edit</a>

                            @endcan
                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can Delete Parent(s) Details')

                            <a href="/deleteUser/{{ $user->id }}" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-red-500 rounded-full hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-50 border border-red-500 focus: dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>

                            @endcan
                        </td>

                    </tr>

                    <tr>

                    </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>
</div>
{{ $users->links() }}

<script type="text/javascript">

    function deleteConfirmation() {

        return confirm('Are you sure you want to delete this user?');
    }
</script>


<script type="text/javascript">

    function toggleModal(modalBox) {

        document.getElementById(modalBox).classList.toggle("hidden");

        document.getElementById(modalBox).classList.toggle("flex");

    }
</script>


<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#students', {
        maxItems: 3,
    });
</script>
<x-sidebar />


<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

            <div class="grid grid-cols-2 gap-">

                <div class="col">
                    @can('Can Create Role')

                    <button class="ml-10 mt-4 block w- 55 text-white mb-8 flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
                        Add New Role
                    </button>

                    <div id="modalBox" aria-hidden="true" class="fixed hidden inset-0 bg-gray-700 bg-opacity-80 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                        <div class="relative px-4 w-full max-w-md h-full md:h-auto">

                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="flex justify-end p-2">
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/roles">
                                    @csrf

                                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add New Role</h3>


                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Role Name</label>
                                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Role Name" required=""><br>


                                        <label for="physical_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selet Permission</label>
                                        <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 relative flex w-full">
                                            <select id="permission" name="permission" multiple placeholder="Select Permission..." autocomplete="off" class="focus:ring-blue-500 w-full rounded-lg cursor-pointer focus:outline-none" multiple>

                                                @foreach($permissions as $permission)

                                                <option block w-full rounded-sm cursor-pointer focus:outline-none value="{{ $permission->id }}">{{ $permission->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>

                                    </div>

                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>


                    @endcan
                </div>

                <div class="col">
                    <div class="lg:inline-flex items-center rounded-full px-0 py-2 mt-2 ml-28">
                        <form method="GET" action="/roles">

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
                            Role</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Edit Role</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            View Role</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Delete Role</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    <tr>
                        @php

                        $i = 1;

                        @endphp

                        @foreach($roles as $role)


                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-12 h-10">
                                    {{ $i++ }}
                                </div>
                                {{ ucwords( strtolower($role->name)) }}
                                <div class="ml-4">
                                    <div class="text-sm font-medium leading-5 text-gray-900">

                                    </div>
                                </div>
                            </div>
                        </td>



                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can Edit Role')

                            <a href="{{ route('roles.edit', $role->id ) }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-white bg-green-500 rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small text-white bg-green-500 rounded-full  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">Edit</a>

                            @endcan

                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can view All Roles')

                            <a href="#" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-gray-900 border border-yellow-500  rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 rounded-full  hover:bg-yellow-400 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-50 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">View</a>

                            @endcan

                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can Delete Role')

                            <a href="{{ route('roles.destroy',$role->id) }}" class="py-2 px-6 mr-2 mb-2 text-sm font-small text-red-500 rounded-full hover:bg-red-500 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-50 border border-red-500 focus: dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700" onclick="return confirm('Are you sure you want to delete this role?')">Delete</a>

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
{{ $roles->links() }}


<script type="text/javascript">
    
    function deleteConfirmation() {

        return confirm('Are you sure you want to delete this role?');
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
    
    new TomSelect('#permission', {
        maxItems: 3,
    });
</script>
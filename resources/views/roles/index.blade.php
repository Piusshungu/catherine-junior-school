@include('admin.dashboard')


<div class="flex flex-col mt-8 w-full">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

        <div class="inline-block min-w-full overflow-hidden align-middle border-b shadow sm:rounded-lg">

            <div class="grid grid-cols-2 gap-">

                <div class="col">
                    @can('Can Create Role')

                    <x-addrole-button />

                    @endcan
                </div>

                <div class="col">
                    <div class="lg:inline-flex items-center rounded-full px-12 py-2 mt-2 ml-28">
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

                            <a href="{{ route('roles.edit', $role->id ) }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 bg-green-500 rounded-fullpy-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 bg-green-500 rounded-full  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">Edit</a>

                            @endcan

                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can view All Roles')

                            <a href="#" class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 bg-yellow-400 rounded-full hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700">View</a>

                            @endcan

                        </td>

                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">

                            @can('Can Delete Role')

                            <a href="{{ route('roles.destroy',$role->id) }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-small text-gray-900 bg-red-500 rounded-full hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:dark:hover:text-white dark:hover:bg-gray-700" onclick="deleteConfirmation()">Delete</a>

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

<script>
    function deleteConfirmation() {
        var txt;
        if (!confirm("Press ok to delete student records!")) {

            return;
        }
        return false;
    }
</script>
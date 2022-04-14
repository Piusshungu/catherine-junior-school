<x-sidebar />


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

                        <th class="px-6 py-3 font-bold text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Create New Class</th>
                    </tr>
                </thead>

            </table>

            <form method="POST" action="/users/saveUser" enctype="multipart/form-data">
                @csrf

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="class">
                            Class Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="class" name="class" type="text" placeholder="Class Name">
                        <p class="text-gray-500 text-xs italic">Example Form One</p>

                    </div>
                    <div class="w-full px-3 mx-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="stream">
                            Stream
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stream" name="stream" type="text" placeholder="Stream">
                        <p class="text-gray-500 text-xs italic">Example A or B</p>
                    </div>

                </div>

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-6 py-8 mb-6 md:mb-0">

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_number">
                            Class Teacher
                        </label>
                        
                        <select id="user" name="user_id" multiple placeholder="Class Teacher" autocomplete="off" class="focus:ring-blue-500 w-full rounded-lg cursor-pointer focus:outline-none h-12" multiple>

                            @foreach($teachers as $teacher)

                            <option block w-full rounded-sm cursor-pointer focus:outline-none value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>

                            @endforeach

                        </select>
                    </div>

                 
                </div>


                <div class="py-3 center mx-auto">

                    <button type="submit" class=" mt-10 ml-10 block w- 55 border border-yellow-500 text-gray mb-8 flex hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Submit</button>

                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        
        function dropDown(dropdown) {

            document.getElementById(dropdown).classList.toggle("hidden");

            document.getElementById(dropdown).classList.toggle("flex");

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
        new TomSelect('#user', {
            maxItems: 1,
        });
    </script>
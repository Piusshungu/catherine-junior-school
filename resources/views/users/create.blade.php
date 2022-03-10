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
                            Create New User</th>
                    </tr>
                </thead>

            </table>

            <form>

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first_name">
                            First Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="first_name" name="first_name" type="text" placeholder="First Name">
                        <p class="text-gray-500 text-xs italic">First Name of User eg. Patrick</p>

                    </div>
                    <div class="w-full px-3 mx-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last_name">
                            Last Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last_name" name="last_name" type="text" placeholder="Last Name">
                        <p class="text-gray-500 text-xs italic">Last Name of User eg. Shungu</p>
                    </div>

                </div>

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" type="email" name="email" placeholder="Email Address">
                        <p class="text-gray-500 text-xs italic">Example shungupius@yahoo.com</p>
                    </div>

                    <div class="w-full px-3 mx-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_number">
                            Phone Number
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone_number" name="phone_number" type="text" placeholder="Phone Number">
                        <p class="text-gray-500 text-xs italic">Example 0754230976</p>
                    </div>
                </div>

                <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="roles">
                            Role
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="roles" name="roles" type="text" placeholder="User Role">
                        <p class="text-gray-500 text-xs italic">Select User Role</p>
                    </div>

                    <div class="w-full px-3 mx-6">

                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
                           Gender
                        </label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="gender" value="male" id="gender">
                                <span class="ml-2">Male</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="gender" value="female" id="gender">
                                <span class="ml-2">Female</span>
                            </label>
                        </div>

                                 
                        
                    </div>
                </div>


                <div class="py-3 center mx-auto">
                    <div class="px-4 py-5 rounded-lg shadow-lg text-center w-48 ml-8">
                        <div class="mb-4">
                            <img class="w-auto mx-auto rounded-full object-cover object-center" src="https://i1.pngguru.com/preview/137/834/449/cartoon-cartoon-character-avatar-drawing-film-ecommerce-facial-expression-png-clipart.jpg" alt="Avatar Upload" />
                        </div>
                        <label class="cursor-pointer mt-6">
                            <span class="mt-2 text-base leading-normal px-4 py-2 bg-blue-500 text-white text-sm rounded-full">Select Avatar</span>
                            <input type='file' name="avatar" class="hidden" :multiple="multiple" :accept="accept" />
                        </label>
                    </div>

                    <button type="submit" class=" mt-10 ml-10 block w- 55 border border-yellow-500 text-gray mb-8 flex hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Submit</button>
                          
                </div>

            </form>
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
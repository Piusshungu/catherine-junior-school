<x-sidebar />


<div class="flex flex-col mt-28 w-full">
    <div class="py-2 -my-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 w-full">

        <div class="inline-block ml-10 w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">

            @if (session()->has('success'))

            <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl text-sm flex">

                <p>{{ session('success') }}</p>
            </div>
            @endif

            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 ml-12">
                    <li class="mr-2">
                        <a href="/users/notifications/email" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-4 border-gray-400 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>EMAIL
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="/users/notifications/sms" class="inline-flex p-4 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>SMS
                        </a>
                    </li>

                </ul>

                <div class="w-full border-b-4 border-yellow-400 mt-8"></div>

                <table class="min-w-full">


                    <thead>
                        <tr>

                            <th class="px-6 py-3 font-bold text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Send Mails Notifications </th>
                        </tr>
                    </thead>

                </table>

                <form method="POST" action="/users/notification/emails/send">
                    @csrf

                    <div class="flex w-full mx-3 mb-6 mt-10 content-center">

                        <div class="w-full px-12 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subject">
                                Mail Subject
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-yellow-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="subject" type="text" placeholder="Mail Subject">

                            <div class="form-group">
                                <textarea class="ckeditor form-control" name="content" required></textarea>
                            </div>

                            @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>

                    <button type="submit" class=" mt-10 ml-10 block w- 55 border border-yellow-500 text-gray mb-8 flex hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Send</button>

                </form>

            </div>
        </div>

        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.ckeditor').ckeditor();
            });
        </script>
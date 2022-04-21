<title>Login</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<section class="px-6 py-8">

    <main class="max-w-lg mx-auto mt-10 bg-gray-200 p-6 rounded-xl border-gray-200">

        <h1 class="text-center font-weight-bold text-xl">SignIn</h1>

        @if (session()->has('error'))

        <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed bg-red-400 text-white py-2 px-4 rounded-xl text-sm flex">

            <p>{{ session('error') }}</p>
        </div>
        @endif

        <form method="POST" action="/login" class="mt-10">
            @csrf

            <div class="mb-6">

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 border-gray-300 mt-10" for="email">

                    Email

                </label>

                <input class="border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email')}}" required>

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror


                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 border-gray-300 mt-10" for="password">

                    Password

                </label>

                <input class="border-gray-400 p-2 w-full" type="password" name="password" id="password" required>

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror



            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded-full py-2 px-4 hover:bg-blue-500">
                    SignIn
                </button>
            </div>


        </form>
    </main>


</section>
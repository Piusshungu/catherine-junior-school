
<!doctype html>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/importStudentsDetails" accept-charset="utf-8" enctype="multipart/form-data">
    @csrf 

<div class="flex justify-center mt-8">
    <div class="rounded-lg shadow-xl bg-gray-50 lg:w-1/2">
        <div class="m-4">
            <label class="inline-block mb-2 text-gray-500"><b>Upload
                File(Excel)</label></b>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class="flex flex-col items-center justify-center pt-7">
                    <img src="/images/excel-icon.svg" alt="" class="mx-auto -mb-6" style="width: 50px;">
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600"><br>
                            Click here to select a file</p>
                    </div>
                    <input type="file" class="opacity-0" name="file" />
                </label>
            </div>
        </div>
        <div class="flex p-2 space-x-4">
        <a href="/students" class="px-4 py-2 text-white bg-red-500 rounded-full">Cancel</a>
         <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-full">Upload</button>
        </div>
    </div>
</div>

</form>
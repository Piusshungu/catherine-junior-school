<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind Multiselect with tom-select</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
      rel="stylesheet"
    />
  </head>

<button class="ml-10 mt-4 block w- 55 text-white mb-8 flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
Add New Role
</button>

<div id="modalBox" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
<div class="relative px-4 w-full max-w-md h-full md:h-auto">

<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
<div class="flex justify-end p-2">
<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</button>
</div>

<form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/addParentDetails">
    @csrf 

<h3 class="text-xl font-medium text-gray-900 dark:text-white">Add New Role</h3>


<div>
<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Role Name</label>
<input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Role Name" required=""><br>


<label for="physical_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selet Permission</label>
      <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 relative flex w-full">
        <select
          id="select-role"
          name="roles[]"
          multiple
          placeholder="Select Permission..."
          autocomplete="off"
          class="block w-full rounded-sm cursor-pointer focus:outline-none"
          multiple
        >
        @foreach($permissions as $permission)
          <option value="{{ $permission->id }}">{{ $permission->name }}</option>

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



<script type="text/javascript">
  function toggleModal(modalBox){
    document.getElementById(modalBox).classList.toggle("hidden");
    // document.getElementById(modalBox + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalBox).classList.toggle("flex");
    // document.getElementById(modalBox + "-backdrop").classList.toggle("flex");
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
      new TomSelect('#select-role', {
        maxItems: 3,
      });
    </script>
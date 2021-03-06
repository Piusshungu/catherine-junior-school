<button class="ml-10 mt-4 block w- 55 text-white mb-8 flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
Add New Student
</button>

<div id="modalBox" aria-hidden="true" class="fixed hidden inset-0 bg-gray-700 bg-opacity-80 overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
<div class="relative px-4 w-full max-w-md h-full md:h-auto">

<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
<div class="flex justify-end p-2">
<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modalBox" onclick="toggleModal('modalBox')">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</button>
</div>

<form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/studentRegistration">
    @csrf 

<h3 class="text-xl font-medium text-gray-900 dark:text-white">Register a New Student</h3>


<div>
<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Name</label>
<input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Full Name" required=""><br>


<label for="registration_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Registration Number</label>
<input type="text" name="registration_number" id="registration_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Registration Number" required=""><br>

<label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Of Birth</label>
<!-- <div class="relative">
  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  </div>
  <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
</div> -->
<input type="text" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Date of Birth" required=""><br>


<label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone Number</label>
<input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required=""><br>

<label for="registration_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Year Registered</label>
<input type="text" name="registration_year" id="registration_year" placeholder="Year Registred" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required=""><br>


<span class="text-gray-700 text-bold">Gender</span>
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
   
    document.getElementById(modalBox).classList.toggle("flex");
   
  }
</script>
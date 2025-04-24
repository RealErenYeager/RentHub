<?php 
include("navbar.php");
?>

<!-- Tenant Register Form -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-100 via-emerald-500 to-blue-50 to-blue-50 px-4 py-10">
  <div class="w-full max-w-3xl bg-white p-10 rounded-3xl shadow-2xl animate-fade-in-up">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Tenant Registration</h2>
    <hr class="border-blue-300 mb-8">

    <form method="POST" action="tenant-engine.php" enctype="multipart/form-data" onsubmit="return Validate()">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="font-semibold text-gray-700">Full Name</label>
          <input type="text" name="full_name" required placeholder="Enter Full Name" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Email</label>
          <input type="email" name="email" required placeholder="Enter Email" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Password</label>
          <input type="password" id="password1" name="password" required placeholder="Enter Password" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Confirm Password</label>
          <input type="password" id="password2" required placeholder="Enter Password Again" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Phone No.</label>
          <input type="text" name="phone_no" required placeholder="Enter Phone Number" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Address</label>
          <input type="text" name="address" required placeholder="Enter Address" class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 transition-all duration-300">
        </div>

        <div>
          <label class="font-semibold text-gray-700">Type of ID</label>
          <select name="id_type" required class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 transition-all duration-300">
            <option>Citizenship</option>
            <option>Driving Licence</option>
          </select>
        </div>

        <div>
          <label class="font-semibold text-gray-700">Upload your Selected Card</label>
          <input type="file" name="id_photo" accept="image/*" onchange="preview_image(event)" required class="mt-1 w-full p-3 rounded-lg border border-gray-300 focus:outline-none transition-all duration-300">
        </div>
      </div>

      <div class="mt-6 text-center">
        <label class="block mb-2 font-semibold text-gray-700">Your selected file preview:</label>
        <img id="output_image" src="" class="mx-auto rounded-md border border-gray-300 shadow-sm w-48 h-48 object-cover" />
      </div>

      <div class="mt-8 flex justify-center">
        <button type="submit" name="tenant_register"
          class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 hover:scale-105 transition-transform duration-300 ease-in-out">
          Register
        </button>
      </div>

      <div class="mt-6 text-center text-sm text-gray-600">
        Want to register as an <a href="owner-register.php" class="text-blue-600 font-semibold hover:underline">Owner</a>?
      </div>
    </form>
  </div>
</section>

<!-- Tailwind Animation CSS -->
<style>
@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in-up {
  animation: fade-in-up 0.7s ease-out;
}
</style>

<!-- JavaScript: Image Preview and Password Validation -->
<script>
function preview_image(event) {
  const reader = new FileReader();
  reader.onload = function () {
    const output = document.getElementById('output_image');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}

function Validate() {
  const pass1 = document.getElementById("password1").value;
  const pass2 = document.getElementById("password2").value;
  if (pass1 !== pass2) {
    alert("Passwords do not match.");
    return false;
  }
  return true;
}
</script>

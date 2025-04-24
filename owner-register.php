<?php include("navbar.php"); ?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6 ">
  <div class="bg-white shadow-lg rounded-xl w-full max-w-2xl p-8 animate__animated animate__fadeIn">
    <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Owner Registration</h3>
    <form method="POST" action="owner-engine.php" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label for="full_name" class="block font-semibold text-gray-700">Full Name</label>
        <input type="text" id="full_name" name="full_name" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="email" class="block font-semibold text-gray-700">Email</label>
        <input type="email" id="email" name="email" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="password1" class="block font-semibold text-gray-700">Password</label>
        <input type="password" id="password1" name="password" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="password2" class="block font-semibold text-gray-700">Confirm Password</label>
        <input type="password" id="password2" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="phone_no" class="block font-semibold text-gray-700">Phone No.</label>
        <input type="text" id="phone_no" name="phone_no" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="address" class="block font-semibold text-gray-700">Address</label>
        <input type="text" id="address" name="address" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="id_type" class="block font-semibold text-gray-700">Type of ID</label>
        <select name="id_type" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option>Citizenship</option>
          <option>Driving Licence</option>
        </select>
      </div>
      <div>
        <label for="id_photo" class="block font-semibold text-gray-700">Upload Your Selected Card</label>
        <input type="file" name="id_photo" accept="image/*" onchange="preview_image(event)" required class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
      <div>
        <label class="block font-semibold text-gray-700">Your Selected File</label>
        <img src="" id="output_image" class="mt-2 w-full max-w-xs h-auto rounded border shadow">
      </div>
      <div class="text-center">
        <button type="submit" name="owner_register" onclick="return Validate()" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Register</button>
      </div>
      <div class="text-right mt-4">
        <label class="text-gray-600">Register as a <a href="tenant-register.php" class="text-blue-600 hover:underline">Tenant</a>?</label>
      </div>
    </form>
  </div>
</div>

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
    const password = document.getElementById("password1").value;
    const confirmPassword = document.getElementById("password2").value;
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }
</script>

<!-- Optional: Animate.css for fade-in -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:owner/owner-index.php");
}

include("navbar.php");
include("owner-engine.php");
?>

<!-- Tailwind Owner Login -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-blue-100 px-4">
  <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
    <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-6">Owner Login</h2>
    <form method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-150">
      </div>
      <div>
        <label for="pwd" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="pwd" name="password" placeholder="Enter your password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-150">
      </div>
      <div class="text-right text-sm">
        <a href="forgot-password-owner.php" class="text-blue-600 hover:underline">Lost your Password?</a>
      </div>
      <button type="submit" name="owner_login"
        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
        Login
      </button>
    </form>
  </div>
</div>

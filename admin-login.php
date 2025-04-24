<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:admin/admin-index.php");
}

include("navbar.php");
include("admin-engine.php");
?>

<!-- Tailwind Admin Login -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-50 to-gray-200 px-4">
  <div class="bg-white shadow-2xl rounded-xl p-8 w-full max-w-md">
    <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Admin Login</h2>
    <form method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500">
      </div>
      <div>
        <label for="pwd" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="pwd" name="password" placeholder="Enter your password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500">
      </div>
      <div class="text-right text-sm">
        <a href="forgot-password-owner.php" class="text-gray-600 hover:text-gray-800 hover:underline">Lost your Password?</a>
      </div>
      <button type="submit" name="admin_login"
        class="w-full bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 transition duration-300">
        Login
      </button>
    </form>
  </div>
</div>

<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:index.php");
}

include("navbar.php");
include("tenant-engine.php");
?>

<!-- Tailwind Login Page -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-100 via-emerald-500 to-blue-50">
  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Tenant Login</h2>
    <form method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="pwd" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="pwd" name="password" placeholder="Enter your password" required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="text-sm text-right">
        <a href="forgot-password-owner.php" class="text-blue-600 hover:underline">Lost your Password?</a>
      </div>
      <button type="submit" name="tenant_login"
        class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
        Login
      </button>
    </form>
  </div>
</div>

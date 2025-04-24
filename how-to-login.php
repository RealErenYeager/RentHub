<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:index.php");
}
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Choose Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="min-h-screen bg-cover  bg-center relative ">

  <!-- Overlay -->
  <!-- <div class="absolute inset-0 bg-black bg-opacity-60"></div> -->

  <!-- Main Card -->
  <div class="relative z-10 flex items-center bg-gradient-to-tr from-blue-100 via-emerald-500 to-blue-50 justify-center h-screen px-4 ">
    <div class="bg-white border border-white/20 rounded-2xl shadow-2xl p-10 w-full max-w-2xl text-center animate-fade-in-up transition-all duration-700">
      
      <h1 class="text-3xl font-bold text-blue-700 font-extrabold mb-4">How do you want to Login?</h1>
      <hr class="border-blue-300 mb-6">
      <p class="font-bold text-gray-600 mb-8 text-sm">
        Choose your role to access the respective dashboard. Make sure you're signing in to the correct panel.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <button onclick="window.location.href='tenant-login.php'" class="flex items-center gap-2 justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-md transition transform hover:scale-105 duration-200">
          <span class="material-icons">person_outline</span> Tenant Login
        </button>
        <button onclick="window.location.href='owner-login.php'" class="flex items-center gap-2 justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl shadow-md transition transform hover:scale-105 duration-200">
          <span class="material-icons">home_work</span> Owner Login
        </button>
        <button onclick="window.location.href='admin-login.php'" class="flex items-center gap-2 justify-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow-md transition transform hover:scale-105 duration-200">
          <span class="material-icons">security</span> Admin Login
        </button>
      </div>

    </div>
  </div>

</body>
</html>
<style>
@keyframes fade-in-up {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out;
}
</style>
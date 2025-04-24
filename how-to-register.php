<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:index.php");
}
include("navbar.php");
?>

<!-- Tailwind Registration Choice Page -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-100 via-emerald-500 to-blue-50 px-4 py-10">
  <div class="bg-white shadow-xl rounded-2xl p-10 w-full max-w-2xl text-center animate-fade-in-up transition-all duration-700">
    <h2 class="text-3xl font-bold text-blue-700 mb-4">How do you want to Register?</h2>
    <hr class="border-blue-300 mb-6">
    <p class="text-gray-600 mb-10">If you want to register as a tenant, click on the Tenant Register button. Otherwise, click on Owner Register.</p>
    
    <div class="flex flex-col sm:flex-row justify-center gap-6">
      <button 
        onclick="window.location.href='tenant-register.php'"
        class="w-full sm:w-48 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:scale-105 transition-all duration-300 ease-in-out">
        Tenant Register
      </button>
      <button 
        onclick="window.location.href='owner-register.php'"
        class="w-full sm:w-48 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:scale-105 transition-all duration-300 ease-in-out">
        Owner Register
      </button>
    </div>
  </div>
</section>

<!-- Tailwind CSS Animation (optional if not using a library) -->
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

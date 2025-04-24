<!DOCTYPE html>
<html lang="en">
<head>
  <title>RentHouse</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2563eb', // blue-600
            secondary: '#1e40af', // blue-800
          },
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-white to-blue-50 shadow-md rounded-3xl">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="index.php">
          <img class="h-12 transition transform hover:scale-105 duration-300" src="images/logo.png" alt="logo">
        </a>
      </div>

      <!-- Hamburger Button (Mobile) -->
      <div class="md:hidden flex items-center">
        <button onclick="toggleMenu()" class="text-gray-700 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Menu Items -->
      <div id="menu" class="hidden md:flex md:items-center md:space-x-6">
        <a href="index.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Home</a>
        <a href="#" class="text-gray-700 hover:text-primary font-medium transition duration-300">About Us</a>
        <a href="#" class="text-gray-700 hover:text-primary font-medium transition duration-300">Contact Us</a>
      </div>

      <!-- Right Side -->
      <div class="hidden md:flex items-center space-x-4">
        <?php if(isset($_SESSION["email"]) && !empty($_SESSION['email'])) { ?>
          <!-- Dropdown -->
          <div class="relative group inline-block">
  <!-- Button wrapper (keeps hover state active) -->
  <div class="flex items-center text-gray-700 hover:text-primary font-medium transition duration-300 cursor-pointer">
    <span class="material-icons mr-1"></span> My Profile
    <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
      <path d="M5.23 7.21a.75.75 0 0 1 1.06 0L10 10.91l3.71-3.7a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.23 8.27a.75.75 0 0 1 0-1.06z" />
    </svg>
  </div>

  <!-- Dropdown menu -->
  <div class="absolute right-0 pt-2 z-50">
    <ul class="hidden group-hover:block w-48 bg-white border border-gray-200 shadow-lg rounded-lg py-2">
      <li><a href="profile.php" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Profile</a></li>
      <li><a href="booked-property.php" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Booked Property</a></li>
      <li><a href="logout.php" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Logout</a></li>
    </ul>
  </div>
</div>


        <?php } else { ?>
          <a href="how-to-register.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">
            <span class="glyphicon glyphicon-user mr-1"></span> Register
          </a>
          <a href="how-to-login.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">
            <span class="glyphicon glyphicon-log-in mr-1"></span> Login
          </a>
        <?php } ?>
      </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden hidden flex-col space-y-2 mt-4 pb-4 border-t pt-4">
      <a href="index.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Home</a>
      <a href="#" class="text-gray-700 hover:text-primary font-medium transition duration-300">About Us</a>
      <a href="#" class="text-gray-700 hover:text-primary font-medium transition duration-300">Contact Us</a>
      <?php if(isset($_SESSION["email"]) && !empty($_SESSION['email'])) { ?>
        <a href="profile.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Profile</a>
        <a href="booked-property.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Booked Property</a>
        <a href="logout.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Logout</a>
      <?php } else { ?>
        <a href="how-to-register.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Register</a>
        <a href="how-to-login.php" class="text-gray-700 hover:text-primary font-medium transition duration-300">Login</a>
      <?php } ?>
    </div>
  </div>
</nav>

<script>
  function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
  }
</script>

</body>
</html>

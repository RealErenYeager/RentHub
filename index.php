<?php 
session_start();
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RentHub</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">






  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white  text-gray-800">

<!-- Hero Section with Background Image -->
<div class="h-[75vh] bg-cover bg-bottom rounded-3xl mt-5 ml-2 mr-2 flex items-center justify-center" style="background-image: url('images/home2.png');">
  <!-- You can add a title or tagline here if desired -->
</div>

<!-- Search Section -->
<div class="max-w-4xl mx-auto px-4 mt-8 ">
  <form method="POST" action="search-property.php" class="w-full">
    <input 
      type="text" 
      name="search_property" 
      placeholder="Enter location to search house..." 
      class="rounded-3xl w-full px-4 py-3 border border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400 shadow-md transition duration-300"
    />
  </form>
</div>

<!-- Property Listing -->
<div class="max-w-7xl mx-auto px-4 mt-12">
  <?php include("property-list.php"); ?>
</div>

</body>
</html>

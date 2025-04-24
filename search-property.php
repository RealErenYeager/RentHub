<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Searched Properties</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
  <?php 
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    include("navbar.php");
    include("config/config.php");
  ?>

  <?php 
    $q_string = $_POST['search_property'];
    $sql="SELECT * FROM add_property WHERE CONCAT(zone,district,province,city,tole,property_type,country) LIKE '%$q_string%'";
    $query=mysqli_query($db,$sql);
  ?>

  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Searched Properties</h1>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <?php if(mysqli_num_rows($query) > 0): ?>
        <?php while ($rows = mysqli_fetch_assoc($query)): ?>
          <?php 
            $property_id = $rows['property_id'];
            $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
            $query2 = mysqli_query($db, $sql2);
            $photo = "placeholder.jpg";
            if(mysqli_num_rows($query2) > 0) {
              $row = mysqli_fetch_assoc($query2);
              $photo = $row['p_photo'];
            }
          ?>

          <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="owner/<?php echo $photo; ?>" alt="Property Photo" class="w-full h-48 object-cover">
            <div class="p-4">
              <h2 class="text-lg font-semibold text-gray-800 mb-1"><?php echo $rows['property_type']; ?></h2>
              <p class="text-gray-600 mb-2"><?php echo $rows['city'] . ', ' . $rows['district']; ?></p>
              <a href="view-property.php?property_id=<?php echo $property_id; ?>" class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition duration-200">View Property</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="col-span-full text-center text-red-500 text-lg">Searched Property not found...</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>

<?php 
include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Properties | RentHouse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-7xl mx-auto px-4 py-8">
  <h2 class="text-3xl font-bold mb-6 text-center">Available Properties</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php 
    $sql = "SELECT * FROM add_property";
    $query = mysqli_query($db, $sql);

    if (mysqli_num_rows($query) > 0) {
      while ($rows = mysqli_fetch_assoc($query)) {
        $property_id = $rows['property_id'];
        $photo = 'default.jpg';

        $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);
        if (mysqli_num_rows($query2) > 0) {
          $row = mysqli_fetch_assoc($query2); 
          $photo = $row['p_photo'];
        }
    ?>
    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
      <img src="<?php echo 'owner/'.$photo; ?>" alt="Property Image" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-semibold mb-1"><?php echo $rows['property_type']; ?></h3>
        <p class="text-gray-600 mb-3"><?php echo $rows['city'].', '.$rows['district']; ?></p>
        <a href="view-property.php?property_id=<?php echo $property_id; ?>" class="inline-block w-full bg-blue-500 hover:bg-blue-600 text-white text-center py-2 px-4 rounded-md transition duration-200">View Property</a>
      </div>
    </div>
    <?php 
      }
    } else {
      echo '<p class="col-span-full text-center text-gray-600">No properties found.</p>';
    }
    ?>
  </div>
</div>

</body>
</html>

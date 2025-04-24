<?php 
session_start();
isset($_SESSION["email"]);
include("navbar.php");
include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booked Properties</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8">Booked Properties</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php 
        $u_email = $_SESSION['email'];
        $sql3 = "SELECT * FROM tenant WHERE email='$u_email'";
        $result3 = mysqli_query($db, $sql3);

        if (mysqli_num_rows($result3) > 0) {
          while ($rowss = mysqli_fetch_assoc($result3)) {
            $tenant_id = $rowss['tenant_id'];

            $sql1 = "SELECT * FROM booking WHERE tenant_id='$tenant_id'";
            $query1 = mysqli_query($db, $sql1);

            if (mysqli_num_rows($query1) > 0) {
              while ($ro = mysqli_fetch_assoc($query1)) {
                $prop_id = $ro['property_id'];

                $sql = "SELECT * FROM add_property WHERE property_id='$prop_id'";
                $query = mysqli_query($db, $sql);

                if (mysqli_num_rows($query) > 0) {
                  while ($rows = mysqli_fetch_assoc($query)) {
                    $property_id = $rows['property_id'];

                    // Fetch property photo
                    $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
                    $query2 = mysqli_query($db, $sql2);
                    $photo = "";
                    if (mysqli_num_rows($query2) > 0) {
                      $row = mysqli_fetch_assoc($query2); 
                      $photo = $row['p_photo'];
                    }
      ?>
        <div class="bg-white shadow-md hover:shadow-xl rounded-xl overflow-hidden transition-shadow duration-300">
          <img src="owner/<?php echo $photo; ?>" alt="Property Photo" class="w-full h-48 object-cover">
          <div class="p-4 text-center">
            <h2 class="text-xl font-semibold text-gray-700 mb-2"><?php echo $rows['property_type']; ?></h2>
            <p class="text-gray-500 mb-4"><?php echo $rows['city'] . ', ' . $rows['district']; ?></p>
            <a href="view-property.php?property_id=<?php echo $rows['property_id']; ?>"
              class="inline-block w-full bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
              View Property
            </a>
          </div>
        </div>
      <?php
                  } // inner while
                } else {
                  echo "<div class='col-span-full text-center text-red-500 font-medium'>Searched Property not found...</div>";
                }
              } // booking while
            }
          }
        }
      ?>
    </div>
  </div>

</body>
</html>

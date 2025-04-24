<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Detail</title>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>
<body class="bg-gray-50 text-gray-800">
<?php 
session_start();
isset($_SESSION["email"]);
include('config/config.php');
include('navbar.php');
include('review-engine.php');
include('booking-engine.php');

$property_id = $_GET['property_id'];
$sql = "SELECT * FROM add_property WHERE property_id='$property_id'";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
  while ($rows = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM property_photo WHERE property_id='$property_id'";
    $query2 = mysqli_query($db, $sql2);
    $rowcount = mysqli_num_rows($query2);
?>

<div class="max-w-7xl mx-auto px-4 py-8">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

    <!-- Image Carousel using Swiper -->
    <div class="relative w-full h-96 overflow-hidden rounded-xl">
      <div class="swiper mySwiper w-full h-full">
        <div class="swiper-wrapper">
          <?php for ($i = 1; $i <= $rowcount; $i++) {
            $row = mysqli_fetch_array($query2);
            $photo = $row['p_photo'];
          ?>
          <div class="swiper-slide">
            <img src="owner/<?php echo $photo ?>" class="w-full h-full object-cover rounded-xl" />
          </div>
          <?php } ?>
        </div>
        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <!-- Property Details -->
    <div class="bg-white p-6 shadow-md rounded-xl">
      <h2 class="text-3xl font-semibold text-center mb-6"><?php echo $rows['property_type'] ?></h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <p><span class="font-semibold">Country:</span> <?php echo $rows['country']; ?></p>
          <p><span class="font-semibold">Province:</span> <?php echo $rows['province']; ?></p>
          <p><span class="font-semibold">Zone:</span> <?php echo $rows['zone']; ?></p>
          <p><span class="font-semibold">District:</span> <?php echo $rows['district']; ?></p>
          <p><span class="font-semibold">City:</span> <?php echo $rows['city']; ?></p>
          <p><span class="font-semibold">Municipality:</span> <?php echo $rows['vdc_municipality']; ?></p>
          <p><span class="font-semibold">Ward No.:</span> <?php echo $rows['ward_no']; ?></p>
          <p><span class="font-semibold">Tole:</span> <?php echo $rows['tole']; ?></p>
          <p><span class="font-semibold">Contact:</span> <?php echo $rows['contact_no']; ?></p>
          <p><span class="font-semibold">Price:</span> Rs.<?php echo $rows['estimated_price']; ?></p>
        </div>
        <div>
          <p><span class="font-semibold">Total Rooms:</span> <?php echo $rows['total_rooms']; ?></p>
          <p><span class="font-semibold">Bedrooms:</span> <?php echo $rows['bedroom']; ?></p>
          <p><span class="font-semibold">Living Room:</span> <?php echo $rows['living_room']; ?></p>
          <p><span class="font-semibold">Kitchen:</span> <?php echo $rows['kitchen']; ?></p>
          <p><span class="font-semibold">Bathroom:</span> <?php echo $rows['bathroom']; ?></p>
          <p><span class="font-semibold">Booked:</span> <?php echo $rows['booked']; ?></p>
          <p><span class="font-semibold">Description:</span> <?php echo $rows['description']; ?></p>
        </div>
      </div>

      <!-- Action Buttons -->
      <?php if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) { ?>
      <div class="mt-6 flex gap-4">
        <form method="POST" class="w-full">
          <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
          <input type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700" name="book_property" value="<?php echo $rows['booked']=='No' ? 'Book Property' : 'Property Booked'; ?>" <?php echo $rows['booked']=='Yes' ? 'disabled' : ''; ?>>
        </form>
        <form method="POST" action="chatpage.php" class="w-full">
          <input type="hidden" name="owner_id" value="<?php echo $rows['owner_id']; ?>">
          <input type="submit" class="w-full py-2 px-4 bg-green-600 text-white rounded hover:bg-green-700" name="send_message" value="Send Message">
        </form>
      </div>
      <?php } else { echo "<p class='mt-4 text-center text-red-600'>You should login to book property.</p>"; } ?>
    </div>
  </div>

  <!-- Google Map -->
  <div id="map" class="mt-10 w-full h-64 rounded-xl"></div>

  <!-- Reviews -->
  <div class="mt-10">
    <h3 class="text-2xl font-semibold mb-4">Review Property:</h3>
    <?php if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) { ?>
    <form method="POST" class="space-y-4">
      <input name="property_id" type="hidden" value="<?php echo $property_id; ?>">
      <textarea name="comment" rows="4" class="w-full p-4 border rounded" placeholder="Write your review..."></textarea>
      <div class="flex justify-between items-center">
        <select name="rating" class="border p-2 rounded">
          <option value="1">1 Star</option>
          <option value="2">2 Stars</option>
          <option value="3">3 Stars</option>
          <option value="4">4 Stars</option>
          <option value="5">5 Stars</option>
        </select>
        <button type="submit" name="review" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Submit Review</button>
      </div>
    </form>
    <?php } else { echo "<p class='text-red-600'>You should login to review property.</p>"; } ?>
  </div>

  <!-- Existing Reviews -->
  <div class="mt-6">
    <h4 class="text-xl font-semibold mb-3">Reviews:</h4>
    <?php 
    $sql1 = "SELECT * FROM review WHERE property_id='$property_id'";
    $query = mysqli_query($db, $sql1);
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        echo "<div class='mb-3 p-4 bg-white border rounded shadow'><p>" . $row['comment'] . "</p><div class='text-yellow-500'>Rating: " . $row['rating'] . " ⭐</div></div>";
      }
    }
    ?>
  </div>
</div>

<script>
  function initialize() {
    var lat = parseFloat(document.getElementById("lat").innerText);
    var lon = parseFloat(document.getElementById("lon").innerText);
    var latlng = new google.maps.LatLng(lat, lon);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    new google.maps.Marker({
      map: map,
      position: latlng
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- Hidden Latitude/Longitude -->
<div id="lat" class="hidden"><?php echo $rows['latitude']; ?></div>
<div id="lon" class="hidden"><?php echo $rows['longitude']; ?></div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

<?php }} ?>
</body>
</html>

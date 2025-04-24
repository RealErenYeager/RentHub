<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["email"])) {
  header("location:index.php");
}
include('navbar.php');
include('tenant-engine.php');
?>

<div class="min-h-screen bg-gray-100 p-6">
  <h2 class="text-3xl font-semibold text-center mb-8 text-gray-800">Tenant Profile</h2>
  <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-6 transition-all duration-500 ease-in-out hover:shadow-2xl">
    <?php 
      include("config/config.php");
      $u_email= $_SESSION["email"];
      $sql="SELECT * from tenant where email='$u_email'";
      $result=mysqli_query($db,$sql);
      if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)) {
    ?>
    <img src="<?php echo $rows['id_photo']; ?>" alt="Avatar" class="w-full h-52 object-cover rounded-xl mb-4">
    <h1 class="text-xl font-bold text-gray-800"><?php echo $rows['full_name']; ?></h1>
    <p class="text-gray-500"><?php echo $rows['email']; ?></p>
    <p class="mt-2 text-sm"><span class="font-semibold">Phone No.:</span> <?php echo $rows['phone_no']; ?></p>
    <p class="text-sm"><span class="font-semibold">Address:</span> <?php echo $rows['address']; ?></p>
    <p class="text-sm"><span class="font-semibold">ID Type:</span> <?php echo $rows['id_type']; ?></p>
    

    <!-- Modal Trigger -->
    <button onclick="document.getElementById('modal').classList.remove('hidden')" class="w-full mt-6 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-all">
      Update Profile
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50 hidden transition-opacity">
      <div class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-lg animate-fade-in">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-semibold text-gray-800">Update Profile</h3>
          <button onclick="document.getElementById('modal').classList.add('hidden')" class="text-gray-500 hover:text-red-600 text-2xl">&times;</button>
        </div>

        <form method="POST">
          <input type="hidden" value="<?php echo $rows['tenant_id']; ?>" name="tenant_id">
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Full Name:</label>
            <input type="text" name="full_name" value="<?php echo $rows['full_name']; ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          </div>
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Email:</label>
            <input type="email" name="email" value="<?php echo $rows['email']; ?>" readonly class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 mt-1">
          </div>
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Phone No.:</label>
            <input type="text" name="phone_no" value="<?php echo $rows['phone_no']; ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1">
          </div>
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Address:</label>
            <input type="text" name="address" value="<?php echo $rows['address']; ?>" class="w-full border border-gray-300 rounded-lg p-2 mt-1">
          </div>
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Type of ID:</label>
            <input type="text" value="<?php echo $rows['id_type']; ?>" readonly class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 mt-1">
          </div>
          <div class="mb-4">
            <label class="block font-medium text-gray-700">Your ID:</label>
            <img src="<?php echo $rows['id_photo']; ?>" class="h-24 rounded-lg object-cover mt-2 border">
          </div>
          <div class="text-center">
            <button type="submit" name="tenant_update" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-all">
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
    <?php }} ?>
  </div>
</div>

<script>
  // Optional: Close modal on outside click
  window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
  }
</script>

<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "Please log in to access the chat.";
    exit;
}

include("config/config.php");

// Fetching owner_id from URL
if (!isset($_GET['owner_id'])) {
    echo "Owner ID not provided.";
    exit;
}
$owner_id = intval($_GET['owner_id']);
$tenant_email = $_SESSION['email'];

// Get tenant_id from email
$getTenant = mysqli_query($db, "SELECT tenant_id FROM tenant WHERE email='$tenant_email'");
if (!$getTenant || mysqli_num_rows($getTenant) == 0) {
    echo "Tenant not found.";
    exit;
}
$tenant = mysqli_fetch_assoc($getTenant);
$tenant_id = $tenant['tenant_id'];

// Sending message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = trim(mysqli_real_escape_string($db, $_POST['message']));
    if (!empty($message)) {
        mysqli_query($db, "INSERT INTO chat (message, owner_id, tenant_id) VALUES ('$message', '$owner_id', '$tenant_id')");
    }
}

// Fetch chat history
$chatQuery = mysqli_query($db, "SELECT * FROM chat WHERE owner_id='$owner_id' AND tenant_id='$tenant_id' ORDER BY timestamp ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Chat with Owner #<?php echo $owner_id; ?></h2>

    <div class="h-64 overflow-y-scroll border border-gray-300 p-4 rounded mb-4 bg-gray-50">
        <?php if (mysqli_num_rows($chatQuery) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($chatQuery)): ?>
                <div class="mb-3">
                    <div class="bg-purple-100 text-purple-900 px-4 py-2 rounded-lg inline-block">
                        <?php echo htmlspecialchars($row['message']); ?>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                        <?php echo date("M d, Y h:i A", strtotime($row['timestamp'])); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-500">No messages yet.</p>
        <?php endif; ?>
    </div>

	<form method="POST" action="chat.php?owner_id=<?php echo $owner_id; ?>" class="flex flex-col space-y-3">
    <textarea name="message" rows="2" placeholder="Type your message..." class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-purple-400"></textarea>
    <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700">Send Message</button>
</form>


    <div class="mt-6 text-center">
        <button onclick="history.back()" class="text-blue-600 hover:underline">← Back</button>
    </div>
</div>

</body>
</html>

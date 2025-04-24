<?php 
ob_start();
session_start();
include("navbar.php");
include("config/config.php");

if(isset($_POST['send_message1'])){
    if(isset($_SESSION["email"])) {
        $u_email = $_SESSION["email"];
        $message = $_POST['message'];
        $owner_id = $_POST['owner_id'];
        $tenant_id = $_POST['tenant_id'];
        
        $sql = "INSERT INTO chat(message,owner_id,tenant_id) VALUES ('$message','$owner_id','$tenant_id')";
        $query = mysqli_query($db,$sql);
        
        if($query) {
            header("Location: ".$_SERVER['PHP_SELF']."?owner_id=".$owner_id);
            exit();
        }
    }
}

if(isset($_POST['send_message']) || isset($_GET['owner_id'])) {
    if(isset($_SESSION["email"])) {
        $u_email = $_SESSION["email"];
        $owner_id = isset($_POST['send_message']) ? $_POST['owner_id'] : $_GET['owner_id'];
        
        $sql = "SELECT * FROM tenant WHERE email='$u_email'";
        $query = mysqli_query($db,$sql);

        if(mysqli_num_rows($query)>0) {
            $rows = mysqli_fetch_assoc($query);
            $tenant_id = $rows['tenant_id'];
            
            $sql1 = "SELECT * FROM chat WHERE owner_id='$owner_id' AND tenant_id='$tenant_id'";
            $query1 = mysqli_query($db,$sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7c3aed',
                        secondary: '#f5f3ff',
                        accent: '#a78bfa',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.2s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-2xl mx-auto p-4 md:p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Chat Messages</h1>
            <button onclick="goBack()" class="px-4 py-2 bg-primary hover:bg-indigo-700 text-white rounded-lg transition-colors duration-200 ease-in-out">
                Go Back
            </button>
        </div>

        <!-- Chat Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Chat Messages -->
            <div class="h-96 p-4 overflow-y-auto scrollbar-hidden bg-gradient-to-b from-secondary to-white">
                <?php if(mysqli_num_rows($query1)>0): ?>
                    <div class="space-y-3">
                        <?php while($row = mysqli_fetch_assoc($query1)): ?>
                            <div class="animate-fade-in">
                                <div class="flex justify-start">
                                    <div class="max-w-xs md:max-w-md bg-primary text-white p-3 rounded-lg rounded-tl-none shadow-sm animate-slide-up">
                                        <p class="text-sm"><?php echo htmlspecialchars($row['message']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="h-full flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="text-lg">No messages yet</p>
                            <p class="text-sm">Start the conversation</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Message Input -->
            <form method="POST" action="" class="border-t border-gray-200 p-4 bg-white">
                <div class="flex space-x-2">
                    <input type="hidden" name="owner_id" value="<?php echo $owner_id; ?>">
                    <input type="hidden" name="tenant_id" value="<?php echo $tenant_id; ?>">
                    <textarea name="message" rows="1" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent resize-none" placeholder="Type your message..." required></textarea>
                    <button type="submit" name="send_message1" class="px-4 py-2 bg-primary hover:bg-indigo-700 text-white rounded-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function goBack() {
        window.history.back();
    }
    
    // Auto-scroll to bottom of chat
    document.addEventListener('DOMContentLoaded', function() {
        const chatContainer = document.querySelector('.overflow-y-auto');
        chatContainer.scrollTop = chatContainer.scrollHeight;
        
        // Auto-resize textarea
        const textarea = document.querySelector('textarea');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
    </script>
</body>
</html>

<?php
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: previous_page.php");
    exit();
}
ob_end_flush();
?>
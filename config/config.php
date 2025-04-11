<?php 

$db = new mysqli("sql312.infinityfree.com", "if0_38686514", "IPP2Lin08rt", "if0_38686514_renthub");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

 ?>
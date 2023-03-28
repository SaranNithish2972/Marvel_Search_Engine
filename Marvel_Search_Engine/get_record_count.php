<?php
require './submit1.php';
global $conn
$sql = "SELECT COUNT(*) FROM history";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo "Total Records: " . $row[0];
?>
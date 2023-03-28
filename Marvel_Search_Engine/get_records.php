<?php
require './submit1.php';
global $conn;
$recordsPerPage = $_POST['recordsPerPage'];
$currentPage = $_POST['currentPage'];
$startIndex = ($currentPage - 1) * $recordsPerPage;
$result = mysqli_query($conn, "SELECT * from history LIMIT $startIndex, $recordsPerPage");

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
    <td>{$row['searched]}</td>
    <td>{$row['date']}</td>
    <td>{$row['location]}</td>
  </tr>";
}
?>


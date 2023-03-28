<?php
require './submit1.php';
$_SESSION = [];
session_unset();
session_destroy();
?>
<script>
  window.onload = function() {
    alert("You have successfully logged out.");
    window.location.href = "login.html";
  };
</script>

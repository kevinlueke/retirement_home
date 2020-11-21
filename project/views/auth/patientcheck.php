<?php
if ($_SESSION['sessionRole'] !== 5) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

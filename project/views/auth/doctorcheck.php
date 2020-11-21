<?php
if ($_SESSION['sessionRole'] !== 2) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

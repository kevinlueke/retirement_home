<?php
if ($_SESSION['sessionRole'] !== 1) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

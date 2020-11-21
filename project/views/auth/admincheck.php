<?php
if ($_SESSION['sessionRole'] !== 0) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

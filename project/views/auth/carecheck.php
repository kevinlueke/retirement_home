<?php
if ($_SESSION['sessionRole'] !== 3) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

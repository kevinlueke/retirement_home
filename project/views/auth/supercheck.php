<?php
if ($_SESSION['accessLevel'] !== 1) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

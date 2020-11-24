<?php
if ($_SESSION['accessLevel'] !== 0) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

<?php
if ($_SESSION['accessLevel'] !== 3) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
}

 ?>

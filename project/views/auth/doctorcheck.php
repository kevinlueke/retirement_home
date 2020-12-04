<?php
if ($_SESSION['accessLevel'] !== 2) {
  session_start();
  session_destroy();
  header("Location: ../../index.php");
}

 ?>

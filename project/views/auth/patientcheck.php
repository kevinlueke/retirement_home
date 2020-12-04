<?php
if ($_SESSION['accessLevel'] !== 5) {
  session_start();
  session_destroy();
  header("Location: ../../index.php");
}

 ?>

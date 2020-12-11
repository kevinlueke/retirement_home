<?php
if ($_SESSION['accessLevel'] !== 4) {
  session_start();
  session_destroy();
  header("Location: ../../index.php");
}

 ?>

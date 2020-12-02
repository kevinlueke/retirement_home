<!DOCTYPE html>

<?php

require_once 'database.php';
require_once '../database/db.php';
require_once 'register-inc.php';

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shady Acres</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>
  <header>
    <nav>
      <ul>
        <li> <a href="../logout.php">Log Out</a></li>
        <?php
          //conditionals for future navigation depending on $_SESSION['accessLevel']
         ?>
      </ul>
    </nav>
  </header>

<!DOCTYPE html>

<?php

require_once 'database.php';
require_once 'register-inc.php';

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shady Acres</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
  </head>
  <body>
  <header>

    <nav>
      <ul>

        <?php
          //conditionals for future navigation depending on $_SESSION['accessLevel']
          if ($_SESSION['accessLevel']==0){ //admin
          echo ' <li> <a href="../admin/adminhome.php">Home</a></li>';
          echo ' <li> <a href="../admin/employees.php">Employees</a></li>';
          echo ' <li> <a href="../admin/approve.php">Approve</a></li>';
          echo ' <li> <a href="../admin/roles.php">Roles</a></li>';
          echo ' <li> <a href="../admin/patients.php">Patients</a></li>';


          }
         ?>

         <li> <a href="../../logout.php">Log Out</a></li>
      </ul>
    </nav>
  </header>

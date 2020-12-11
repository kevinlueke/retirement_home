<!DOCTYPE html>

<?php

require_once 'database.php';
require_once '../../database/db.php';
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
          echo ' <li> <a href="../admin/roster.php">New Roster</a></li>';
          echo ' <li> <a href="../admin/viewroster.php">View Roster</a></li>';


        }elseif ($_SESSION['accessLevel']==1) {
          echo ' <li> <a href="../supervisor/superhome.php">Home</a></li>';
          echo ' <li> <a href="../supervisor/employees.php">Employees</a></li>';
          echo ' <li> <a href="../supervisor/approve.php">Approve</a></li>';
          echo ' <li> <a href="../supervisor/patients.php">Patients</a></li>';
          echo ' <li> <a href="../supervisor/roster.php">New Roster</a></li>';
          echo ' <li> <a href="../supervisor/viewroster.php">View Roster</a></li>';

        }elseif ($_SESSION['accessLevel']==2) {
          echo ' <li> <a href="../doctor/superhome.php">Home</a></li>';
          echo ' <li> <a href="../doctor/patients.php">Patients</a></li>';
          echo ' <li> <a href="../doctor/viewroster.php">View Roster</a></li>';

        }elseif ($_SESSION['accessLevel']==3) {
          echo ' <li> <a href="../caregiver/superhome.php">Home</a></li>';
          echo ' <li> <a href="../caregiver/patients.php">Patients</a></li>';
          echo ' <li> <a href="../caregiver/viewroster.php">View Roster</a></li>';

        }elseif ($_SESSION['accessLevel']==4) {
          echo ' <li> <a href="../patient/patienthome.php">Home</a></li>';
          echo ' <li> <a href="../patient/viewroster.php">View Roster</a></li>';

        }elseif ($_SESSION['accessLevel']==5) {
          echo ' <li> <a href="../family/patienthome.php">Home</a></li>';
          echo ' <li> <a href="../family/viewroster.php">View Roster</a></li>';

        }
         ?>

         <li> <a href="../../logout.php">Log Out</a></li>
      </ul>
    </nav>
  </header>

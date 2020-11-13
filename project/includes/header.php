<!DOCTYPE html>

<?php
session_start();
require_once 'database.php';
require_once 'register-inc.php';

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shady Acres</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <header>
    <nav>
      <ul>
        <li> <a href="index.php">Home</a> </li>
        <li> <a href="login.php">Log In</a></li>
        <li> <a href="register.php">Register</a></li>
      </ul>
    </nav>
  </header>

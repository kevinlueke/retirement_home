<?php
require_once 'includes/header.php';
?>


<div>
  <div class="warning">
    <?php
      if(isset($_SESSION["warning"])){
          $error = $_SESSION["warning"];
          echo "<span>$error</span>";
      }
    ?>
  </div>

    <h1>Log in</h1>
    <p> Not a family member? <a href="login.php">Log In Here!</a></p>
    <form action="includes/family-inc.php" method="post">
        <input type="id" name="id" placeholder="Patient Id">
        <input type="code" name="code" placeholder="Family Code">
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>
<?php
require_once 'includes/footer.php';
?>

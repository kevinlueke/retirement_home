<?php
require_once 'includes/header.php';
?>


<div>
  <div class="error">
    <?php
    
    ?>
  </div>

    <h1>Log in</h1>
    <p> No account? <a href="register.php">Register here!</a></p>
    <form action="includes/login-inc.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>
<?php
require_once 'includes/footer.php';
?>

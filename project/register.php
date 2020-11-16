<?php
require_once 'includes/header.php';
?>

<div>
    <h1>Register</h1>
    <p> Already have an account? <a href="login.php">Login!</a></p>

    <form action="includes/register-inc.php" method="post">
      <select id="operation" name="operation">
        <option value="1">Patient</option>
        <option value="2">Nurse</option>
        <option value="3">Doctor</option>
        <option value="4">Supervisor</option>
        <option value="5">Admin</option>
      </select>
        <input type="text" name="fName" placeholder="First Name">
        <input type="text" name="lName" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="fName" placeholder="Phone Number">
        <input type="date" name="fName" placeholder="Date of Birth">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirmPassword" placeholder="Confirm password">

        <button type="submit" name="submit">REGISTRER</button>
    </form>
</div>

<?php
require_once 'includes/footer.php';
?>

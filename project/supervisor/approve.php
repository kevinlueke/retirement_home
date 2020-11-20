<?php

require_once '../includes/header.php';

//WAITING FOR AUTH CODE FROM SCOOT
//if auth() then run code
//else get the user out of this area since they shouldn't be here

echo <<<"EOT"
  <body>
    <form action='checkApproval.php' method='POST'>
    <table class="approve">
    <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Deny</th>
      <th>Allow</th>
    </tr>
  EOT;
if ($stmt = $conn->prepare('SELECT u.id, u.first_name, u.last_name, r.name
                            FROM Users u JOIN Roles r ON u.role_id = r.id
                            WHERE u.approved = 0;')) {
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($user_id, $first_name, $last_name, $role);

  while ($stmt->fetch()) {
    echo <<<"EOT"
    
      <tr>
        <td>$first_name $last_name</td>
        <td>$role</td>
        <td><input type='checkbox' name='deny' value=$user_id></td>
        <td><input type='checkbox' name='allow' value=$user_id></td>

    EOT;  
  }
  $stmt->close();
}

echo <<<"EOT"
      <input type='submit' value='submit'>
    </form>
  </body>
EOT;

?>

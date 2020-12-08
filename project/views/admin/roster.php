<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>
<div class="warning">
  <?php
      $error = $_SESSION["warning"];
      echo "<span>$error</span>";
  ?>
</div>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    if (isset($_SESSION["confirm"])) {
      echo "Role added!";
      unset($_SESSION["confirm"]);
    }
    echo "<h1>Roster</h1>";

if ( $link) {
  echo <<<"EOT"
      <form class='form-style' action='createroster.php' method='post'>
        <label>Date:
  EOT;
  echo "<input type='date' name='date' value='" . date('Y-m-d') . "'></label>";

  if ($stmt = $link->prepare("SELECT id, first_name, last_name, role_id
    FROM Users WHERE approved = 1 AND role_id < 5;")) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $fname, $lname, $role_id);

    $supers = [];
    $doctors = [];
    $caregivers = [];

    while ($stmt->fetch()) {
      if ($role_id == 2){
        $supers[] = ["name" => ucfirst($fname) . ' ' . ucfirst($lname), "id" => $id];
      }elseif ($role_id == 3) {
        $doctors[] = ["name" => ucfirst($fname) . ' ' . ucfirst($lname), "id" => $id];
      }elseif ($role_id ==4 ) {
        $caregivers[] = ["name" => ucfirst($fname) . ' ' . ucfirst($lname), "id" => $id];
      }
    }
    $stmt->close();
  }

  function select ($label, $name, $arr) {
    echo <<<"EOT"
      <label>$label:
        <select name="$name" required>
        <option value="">Pick One</option>
    EOT;
    foreach ($arr as $elem) {
      echo "<option value=$elem[id]>$elem[name]</option>";
    }
    echo <<<"EOT"
        </select>
      </label>
    EOT;
  }

  select('Supervisor', 'super', $supers);
  select('Doctor', 'doctor', $doctors);
  select('Caregiver 1', 'cgone', $caregivers);
  select('Caregiver 2', 'cgtwo', $caregivers);
  select('Caregiver 3', 'cgthree', $caregivers);
  select('Caregiver 4', 'cgfour', $caregivers);

  echo <<<"EOT"
        <input type='submit' value='Submit'>
      </form>

  EOT;
}
?>

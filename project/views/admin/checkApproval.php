<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

if (isset($_POST['allow'])) {
  foreach ($_POST['allow'] as $user_id) {
    if ($stmt = $conn->prepare('UPDATE Users SET approved = 1 WHERE id = ?;')) {
      $stmt->bind_param('i', $user_id);
      $stmt->execute();
      $stmt->close();
    }
  }
}
if (isset($_POST['deny'])) {
  foreach ($_POST['deny'] as $user_id) {
    if ($stmt = $conn->prepare('DELETE FROM Users WHERE approved = 0 and id = ?;')) {
      $stmt->bind_param('i', $user_id);
      $stmt->execute();
      $stmt->close();
    }
  }
}
header('Location: approve.php');
?>

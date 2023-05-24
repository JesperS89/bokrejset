<?php

require "../classes/user.php";

$userModel = new User(require "../partials/connect.php");

if (isset($_POST["user_id"])) {
  $id = (int) filter_var($_POST["user_id"], FILTER_SANITIZE_NUMBER_INT);
  $userModel->deleteUserById($id);
}

header("Location: ../users.php");

?>

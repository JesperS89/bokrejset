<?php

require "../classes/user.php";
$userModel = new User(require "../partials/connect.php");

if (isset($_POST["firstname"])) {
  $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_SPECIAL_CHARS);

  $userModel->addUser($firstname);
}

header("Location: ../users.php");

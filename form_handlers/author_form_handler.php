<?php

require "../classes/author_model.php";
$authorModel = new AuthorModel(require "../partials/connect.php");

if (isset($_POST["firstname"], $_POST["lastname"])) {
  $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_SPECIAL_CHARS);

  $authorModel->addAuthor($firstname, $lastname);
}

header("Location: ../authors.php");

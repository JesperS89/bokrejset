<?php

require "../classes/review.php";

$reviewModel = new Review(require "../partials/connect.php");

if (isset($_POST["review"], $_POST["user-id"], $_POST["book-id"])) {
  $book_id = (int) $_POST["book-id"];

  $user_id = (int) $_POST["user-id"];
  $review = filter_var($_POST["review"], FILTER_SANITIZE_SPECIAL_CHARS);

  $reviewModel->addReview($book_id, $user_id, $review);
}
header("Location: ../reviews.php");
?>

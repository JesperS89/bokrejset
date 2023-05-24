<?php
require "classes/book.php";
require "classes/book-view.php";
require "classes/review.php";
require "classes/review-view.php";

$pdo = require "partials/connect.php";

include "partials/nav.php";

$db = new DB($pdo);
$bookModel = new Book($pdo);
$bookView = new BookView();
$bookReview = new Review($pdo);
$bookReviewView = new ReviewView();
include "partials/header.php";

include "partials/search_book_form.php";

if (isset($_POST["booksearch"])) {
  $title = filter_var($_POST["booksearch"], FILTER_SANITIZE_SPECIAL_CHARS);

  $bookTitle = $bookModel->getBookByTitle($title);

  $bookView->renderBookByTitle($bookTitle);
}

if (isset($_GET["bookid"])) {
  $id = filter_var($_GET["bookid"], FILTER_SANITIZE_NUMBER_INT);

  $reviews = $bookReview->getReviewsByBookTitle($id);
  $bookReviewView->renderReviews($reviews);
}
include "partials/footer.php";

?>

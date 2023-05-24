<?php
require "classes/review-view.php";
require "classes/db.php";
require "classes/review.php";

$pdo = require "partials/connect.php";

include "partials/nav.php";

$db = new DB($pdo);
$reviewModel = new Review($pdo);
$reviewView = new ReviewView();
echo "<h1>Recensioner</h1>";

$reviewsWithJoin = $reviewModel->getReviewsWithJoin("usersbooks");

$reviewView->getReviews($reviewsWithJoin);

if (isset($_GET["reviewid"])) {
  $id = filter_var($_GET["reviewid"], FILTER_SANITIZE_NUMBER_INT);

  $review = $reviewModel->getReviewsWithJoin($id);

  $reviewView->renderSingleReview($review);
}

include "partials/review_form.php";

include "partials/footer.php";

?>

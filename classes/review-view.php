<?php

class ReviewView
{
  public function renderAllReviewsAsList(array $reviews): void
  {
    echo "<ul>";
    foreach ($reviews as $review) {
      echo "<li>{$review["id"]}, {$review["userid"]}</li>";
    }
    echo "</ul>";
  }
  public function getReviews(array $reviews): void
  {
    echo "<ul>";
    foreach ($reviews as $review) {
      echo "<li>{$review["name"]} har läst boken {$review["title"]}. <a href='reviews.php?reviewid={$review["id"]}'>Gå till recension</a></li>";
    }
    echo "</ul>";
  }
  public function renderReviews($review)
  {
    echo "<h2>" . "Recensioner för " . $review[0]["title"] . "</h2>";
    echo "<ul>";
    foreach ($review as $review) {
      echo "<p>" . $review["review"] . "</p><br>";
    }
  }
  public function renderSingleReview($review)
  {
    echo $review[0]["title"];
  }
}

?>

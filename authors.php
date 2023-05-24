<?php
require "classes/author_model.php";
require "classes/author_view.php";

$pdo = require "partials/connect.php";

$authorModel = new AuthorModel($pdo);
$authorView = new AuthorView();

include "partials/nav.php";

$authors = $authorModel->getAllAuthors();

$authorView->renderAllAuthors($authors);

if (isset($_GET["authorid"])) {
  $id = (int) filter_var($_GET["authorid"], FILTER_SANITIZE_NUMBER_INT);
  $booksByThisAuthor = $authorModel->getBooksByAuthor($id);

  $authorView->renderBooksByAuthor($booksByThisAuthor);
}
include "partials/author_form.php";

include "partials/footer.php";

?>

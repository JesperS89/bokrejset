

<?php
require "classes/user-view.php";
require "classes/db.php";
require "classes/user.php";

$pdo = require "partials/connect.php";

include "partials/nav.php";

echo "<h1>Användare</h1>";

$db = new DB($pdo);
$userModel = new User($pdo);
$userView = new UserView();

$users = $userModel->getAllUsers("users");

$userView->renderAllUsersAsList($users);

if (isset($_GET["userid"])) {
  $id = (int) filter_var($_GET["userid"], FILTER_SANITIZE_NUMBER_INT);
  $user = $userModel->getUserById($id);
  $userPages = $userModel->getPagesByUser($id);

  $userView->renderUser($user, $userPages);
}
include "partials/user_form.php";
include "partials/delete_user_form.php";
include "partials/footer.php";


?>

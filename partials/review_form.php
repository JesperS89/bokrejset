

<?php
require_once "classes/review.php";
require_once "classes/user.php";
require_once "classes/book.php";
$reviewModel = new Review(connect($host, $database, $user, $password));
$userModel = new User(connect($host, $database, $user, $password));
$bookModel = new Book(connect($host, $database, $user, $password));
?>

<h3>Lägg till recension</h3>

<form action="form_handlers/review_form_handler.php" method="post">

<label for="user">Användare:</label>
<select name="user-id" id="user">
    <option value="">-- Välj användare --</option>
<?php
$users = $userModel->getAllUsers();
foreach ($users as $user) {
  echo "<option value='{$user["id"]}'>{$user["name"]}</option>";
}
?>
</select>
<br>
<label for="book">Bok:</label>
<select name="book-id" id="book">
    <option value="">-- Välj bok --</option>
<?php
$books = $bookModel->getAllBooks();
foreach ($books as $book) {
  echo "<option value='{$book["id"]}'>{$book["title"]}</option>";
}
?>
</select>
<br>
<label for="review">Skriv din recension:</label>
<input type="text" name="review" id="review">
<br>
<Button type="submit">Lägg till</Button>

</form>

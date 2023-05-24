

<?php
require_once "classes/author_model.php";
$authorModel = new AuthorModel(connect($host, $database, $user, $password));
?>


<h3>Lägg till bok</h3>
<form action="form_handlers/book_form_handler.php" method="post">
    <label for="title">Titel:</label>
<input type="text" name="title" id="title"><br>
<label for="pages">Sidor:</label>

<input type="text" name="pages" id="pages"><br>

<label for="author">Författare:</label>
<select name="author-id" id="author">
    <option value="">Välj författare</option>


<?php
$authors = $authorModel->getAllAuthors();
foreach ($authors as $author) {
  echo "<option value='{$author["id"]}'>{$author["firstname"]} {$author["lastname"]}</option>";
}
?>

</select>

<button type="submit">Lägg till</button>
</form>
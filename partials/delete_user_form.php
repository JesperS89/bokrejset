<?php
require_once "classes/user.php";
$userModel = new User(connect($host, $database, $user, $password));
?>
<h4>Ta bort användare</h4>

<form action="form_handlers/delete_user_form_handler.php" method="post">

<label for="user_id">Användare</label>
<select name="user_id" id="user_id">
<option value="">-- Välj användare --</option>
<?php
$users = $userModel->getAllUsers();
foreach ($users as $user) {
  echo "<option value='{$user["id"]}'>{$user["name"]}</option>";
}
?>

</select>
<br>
<button type="submit">Ta bort</button>


</form>
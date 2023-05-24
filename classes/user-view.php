<?php

class UserView
{
  public function renderAllUsersAsList(array $users): void
  {
    echo "<ul>";
    foreach ($users as $user) {
      echo "<li><a href='users.php?userid={$user["id"]}'>{$user["name"]}</a></li>";
    }
    echo "</ul>";
  }
  public function renderUser($user, $userPages): void
  {
    echo "<ul>";
    echo "<h1>{$user[0]["name"]}</h1>";
    echo "<h3>Lästa böcker</h3>";
    foreach ($user as $book) {
      echo "<h4>{$book["title"]}</h4> <p>{$book["review"]}</p>";
    }
    echo "<h4>Totalt Antal sidor lästa: {$userPages[0]["pages"]}</h4";
    echo "</ul>";
  }
} ?>



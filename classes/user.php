<?php

require_once "db.php";

class User extends DB
{
  protected $table = "users";

  public function getAllUsers()
  {
    return $this->getAll($this->table);
  }
  public function getUserById(int $id)
  {
    try {
      $query = "SELECT users.name, books.title, usersbooks.review FROM users
LEFT JOIN usersbooks on usersbooks.userid = users.id
 LEFT JOIN books on books.id = usersbooks.bookid
WHERE users.id = ?
   ";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getPagesByUser(int $id)
  {
    try {
      $query = "SELECT users.name, SUM(books.pages) as pages FROM users
      LEFT JOIN usersbooks on usersbooks.userid = users.id
       LEFT JOIN books on books.id = usersbooks.bookid
      WHERE users.id = ?
      GROUP BY users.id
         ";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function addUser(string $name)
  {
    try {
      $query = "INSERT INTO $this->table (name) VALUES (?)";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$name]);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function deleteUserById(int $id)
  {
    try {
      $query = "DELETE FROM $this->table WHERE id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>

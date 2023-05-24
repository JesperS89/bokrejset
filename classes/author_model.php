<?php

require_once "db.php";

class AuthorModel extends DB
{
  protected $table = "Authors";

  public function getAllAuthors()
  {
    return $this->getAll($this->table);
  }

  public function addAuthor(string $firstname, string $lastname)
  {
    try {
      $query = "INSERT INTO $this->table (firstname,lastname) VALUES (?,?)";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$firstname, $lastname]);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getBooksByAuthor(int $id)
  {
    try {
      $query = "SELECT * FROM $this->table
      JOIN books on books.author_id = Authors.id
      WHERE Authors.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchALl(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

<?php

require_once "db.php";

class Book extends DB
{
  protected $table = "books";

  public function getAllBooks()
  {
    return $this->getAll($this->table);
  }
  public function getBookByTitle($title)
  {
    $query = "SELECT * FROM books WHERE title LIKE '%'  ?  '%'";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$title]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getBookById($id)
  {
    try {
      $query = "SELECT * FROM books
    LEFT JOIN usersbooks on usersbooks.bookid = books.id
    LEFT JOIN users on usersbooks.userid = users.id
    WHERE books.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function addBook(string $title, int $pages, int $authorId)
  {
    $query = "INSERT INTO $this->table (title, pages, author_id) VALUES (?,?,?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$title, $pages, $authorId]);
  }
}

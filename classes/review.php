<?php

require_once "db.php";

class Review extends DB
{
  protected $table = "usersbooks";

  public function getAllReviews()
  {
    return $this->getAll($this->table);
  }
  public function getReviewsWithJoin($table)
  {
    $query = "SELECT users.name, books.title, $table.id, $table.review FROM $table
    JOIN users ON users.id = $table.userid
    JOIN books ON books.id = $table.bookid";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getReviewsByBookTitle($id)
  {
    try {
      $query = "SELECT * FROM `books`
     LEFT JOIN usersbooks on books.id = usersbooks.bookid
       WHERE books.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getReviewsById($id)
  {
    try {
      $query = "SELECT users.name, books.title, usersbooks.id, usersbooks.review FROM usersbooks
    JOIN users ON users.id = usersbooks.userid
    JOIN books ON books.id = usersbooks.bookid
    WHERE usersbooks.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function addReview(int $book_id, int $user_id, string $review)
  {
    $query = "INSERT INTO $this->table (bookid, userid, review) VALUES (?,?,?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$book_id, $user_id, $review]);
  }
}

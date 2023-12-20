<?php
require_once 'Book.php';

class BookDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBooks() {
        $query = "SELECT * FROM BOOK";
        $stmt = $this->db->getConnection()->query($query);
        $books = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row['ISBN'], $row['Title'], $row['Genra'], $row['Price'], $row['NbrofPages'], $row['Author']);
        }

        return $books;
    }

    public function createBook(Book $book) {
        $query = "INSERT INTO BOOK (ISBN, Title, Genra, Price, NbrofPages, Author) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);

        $stmt->execute([$book->getIsbn(), $book->getTitle(), $book->getGenre(), $book->getPrice(), $book->getPages(), $book->getAuthor()]);
    }
}
?>
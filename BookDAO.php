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
}
?>
<?php

require_once 'connexion.php';
require_once 'BookDAO.php';

$db = Database::getInstance();
$bookDAO = new BookDAO($db);

$books = $bookDAO->getAllBooks();

foreach ($books as $book) {
    echo "ISBN: " . $book->getIsbn() . "<br>";
    echo "Title: " . $book->getTitle() . "<br>";
    echo "Genre: " . $book->getGenre() . "<br>";
    echo "Price: $" . $book->getPrice() . "<br>";
    echo "Number of Pages: " . $book->getPages() . "<br>";
    echo "Author: " . $book->getAuthor() . "<br><br>";
}

?>
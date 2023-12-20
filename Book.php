<?php
class Book {
    private $isbn;
    private $title;
    private $genre;
    private $price;
    private $pages;
    private $author;

    public function __construct($isbn, $title, $genre, $price, $pages, $author) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->genre = $genre;
        $this->price = $price;
        $this->pages = $pages;
        $this->author = $author;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getPages() {
        return $this->pages;
    }

    public function getAuthor() {
        return $this->author;
    }
}
?>
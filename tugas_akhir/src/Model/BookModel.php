<?php

namespace Model;
class BookModel
{
    private $id;
    private $categoryId;
    private $title;
    private $author;
    private $releaseDate;
    private $summary;
    private $downloadLink;
    private $size;
    private $createdBy;
    private $createdAt;
    private $updatedBy;
    private $updatedAt;
    private $deleted;

    public function __construct(
        $id,
        $categoryId,
        $title,
        $author,
        $releaseDate,
        $summary,
        $downloadLink,
        $size,
        $createdBy,
        $createdAt,
        $updatedBy,
        $updatedAt,
        $deleted
    ) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->author = $author;
        $this->releaseDate = $releaseDate;
        $this->summary = $summary;
        $this->downloadLink = $downloadLink;
        $this->size = $size;
        $this->createdBy = $createdBy;
        $this->createdAt = $createdAt;
        $this->updatedBy = $updatedBy;
        $this->updatedAt = $updatedAt;
        $this->deleted = $deleted;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getDownloadLink()
    {
        return $this->downloadLink;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function isDeleted()
    {
        return $this->deleted;
    }

    public function save()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare(
            "INSERT INTO books (id, category_id, title, author, release_date, summary, download_link, size, created_by, created_at, updated_by, updated_at, deleted) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        // Bind parameters
        $stmt->bind_param(
            "sssssssissssi",
            $this->id,
            $this->categoryId,
            $this->title,
            $this->author,
            $this->releaseDate,
            $this->summary,
            $this->downloadLink,
            $this->size,
            $this->createdBy,
            $this->createdAt,
            $this->updatedBy,
            $this->updatedAt,
            $this->deleted
        );

        // Execute the query
        $result = $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        return $result;
    }

    public static function findById($id)
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM books WHERE id = ?");

        // Bind parameter
        $stmt->bind_param("s", $id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        // Check if a record was found
        if ($result->num_rows === 0) {
            return null;
        }

        // Fetch the record as an associative array
        $bookData = $result->fetch_assoc();

        // Create a BookModel object
        $book = new BookModel(
            $bookData['id'],
            $bookData['category_id'],
            $bookData['title'],
            $bookData['author'],
            $bookData['release_date'],
            $bookData['summary'],
            $bookData['download_link'],
            $bookData['size'],
            $bookData['created_by'],
            $bookData['created_at'],
            $bookData['updated_by'],
            $bookData['updated_at'],
            $bookData['deleted']
        );

        return $book;
    }

    public static function findAll()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM books");

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        $books = [];

        // Loop through the result and create BookModel objects
        while ($bookData = $result->fetch_assoc()) {
            $book = new BookModel(
                $bookData['id'],
                $bookData['category_id'],
                $bookData['title'],
                $bookData['author'],
                $bookData['release_date'],
                $bookData['summary'],
                $bookData['download_link'],
                $bookData['size'],
                $bookData['created_by'],
                $bookData['created_at'],
                $bookData['updated_by'],
                $bookData['updated_at'],
                $bookData['deleted']
            );
            $books[] = $book;
        }

        return $books;
    }

    public function update()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare(
            "UPDATE books 
            SET category_id = ?, title = ?, author = ?, release_date = ?, summary = ?, download_link = ?, size = ?, updated_by = ?, updated_at = ?, deleted = ? 
            WHERE id = ?"
        );

        // Bind parameters
        $stmt->bind_param(
            "ssssssisiss",
            $this->categoryId,
            $this->title,
            $this->author,
            $this->releaseDate,
            $this->summary,
            $this->downloadLink,
            $this->size,
            $this->updatedBy,
            $this->updatedAt,
            $this->deleted,
            $this->id
        );

        // Execute the query
        $result = $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        return $result;
    }

    public function delete()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("DELETE FROM books WHERE id = ?");

        // Bind parameter
        $stmt->bind_param("s", $this->id);

        // Execute the query
        $result = $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        return $result;
    }

    public static function searchByNameAndLevel($name, $level)
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM books WHERE title LIKE ? AND level = ?");

        // Bind parameters
        $searchName = '%' . $name . '%';
        $stmt->bind_param("ss", $searchName, $level);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        $books = [];

        // Loop through the result and create BookModel objects
        while ($bookData = $result->fetch_assoc()) {
            $book = new BookModel(
                $bookData['id'],
                $bookData['category_id'],
                $bookData['title'],
                $bookData['author'],
                $bookData['release_date'],
                $bookData['summary'],
                $bookData['download_link'],
                $bookData['size'],
                $bookData['created_by'],
                $bookData['created_at'],
                $bookData['updated_by'],
                $bookData['updated_at'],
                $bookData['deleted']
            );
            $books[] = $book;
        }

        return $books;
    }
}

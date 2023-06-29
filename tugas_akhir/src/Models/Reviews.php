<?php

class Review
{
    private $id;
    private $bookId;
    private $userId;
    private $rating;
    private $comment;
    private $createdBy;
    private $createdAt;
    private $updatedBy;
    private $updatedAt;
    private $deleted;

    public function __construct(
        $id,
        $bookId,
        $userId,
        $rating,
        $comment,
        $createdBy,
        $createdAt,
        $updatedBy,
        $updatedAt,
        $deleted
    ) {
        $this->id = $id;
        $this->bookId = $bookId;
        $this->userId = $userId;
        $this->rating = $rating;
        $this->comment = $comment;
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

    public function getBookId()
    {
        return $this->bookId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
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

    public static function findById($id)
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM reviews WHERE id = ?");

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
        $reviewData = $result->fetch_assoc();

        // Create a Review object
        $review = new Review(
            $reviewData['id'],
            $reviewData['book_id'],
            $reviewData['user_id'],
            $reviewData['rating'],
            $reviewData['comment'],
            $reviewData['created_by'],
            $reviewData['created_at'],
            $reviewData['updated_by'],
            $reviewData['updated_at'],
            $reviewData['deleted']
        );

        return $review;
    }

    public static function findAll()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM reviews");

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        $reviews = [];

        // Loop through the result and create Review objects
        while ($reviewData = $result->fetch_assoc()) {
            $review = new Review(
                $reviewData['id'],
                $reviewData['book_id'],
                $reviewData['user_id'],
                $reviewData['rating'],
                $reviewData['comment'],
                $reviewData['created_by'],
                $reviewData['created_at'],
                $reviewData['updated_by'],
                $reviewData['updated_at'],
                $reviewData['deleted']
            );
            $reviews[] = $review;
        }

        return $reviews;
    }

    public function save()
    {
        // Database connection
        $db = include 'config/database.php';

        if ($this->id) {
            // Update an existing record
            $stmt = $db->prepare("UPDATE reviews SET book_id = ?, user_id = ?, rating = ?, comment = ?, updated_by = ?, updated_at = current_timestamp(), deleted = ? WHERE id = ?");

            $stmt->bind_param(
                "ssisssi",
                $this->bookId,
                $this->userId,
                $this->rating,
                $this->comment,
                $this->updatedBy,
                $this->deleted,
                $this->id
            );
        } else {
            // Insert a new record
            $stmt = $db->prepare("INSERT INTO reviews (book_id, user_id, rating, comment, created_by, created_at, updated_by, updated_at, deleted) VALUES (?, ?, ?, ?, ?, current_timestamp(), ?, current_timestamp(), ?)");

            $stmt->bind_param(
                "ssissis",
                $this->bookId,
                $this->userId,
                $this->rating,
                $this->comment,
                $this->createdBy,
                $this->updatedBy,
                $this->deleted
            );
        }

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
        $stmt = $db->prepare("DELETE FROM reviews WHERE id = ?");

        // Bind parameter
        $stmt->bind_param("s", $this->id);

        // Execute the query
        $result = $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        return $result;
    }
}
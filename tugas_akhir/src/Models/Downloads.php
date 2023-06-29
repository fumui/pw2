<?php

class Download
{
    private $id;
    private $bookId;
    private $userId;
    private $createdBy;
    private $createdAt;
    private $updatedBy;
    private $updatedAt;
    private $deleted;

    public function __construct(
        $id,
        $bookId,
        $userId,
        $createdBy,
        $createdAt,
        $updatedBy,
        $updatedAt,
        $deleted
    ) {
        $this->id = $id;
        $this->bookId = $bookId;
        $this->userId = $userId;
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
        $stmt = $db->prepare("SELECT * FROM downloads WHERE id = ?");

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
        $downloadData = $result->fetch_assoc();

        // Create a Download object
        $download = new Download(
            $downloadData['id'],
            $downloadData['book_id'],
            $downloadData['user_id'],
            $downloadData['created_by'],
            $downloadData['created_at'],
            $downloadData['updated_by'],
            $downloadData['updated_at'],
            $downloadData['deleted']
        );

        return $download;
    }

    public static function findAll()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM downloads");

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        $downloads = [];

        // Loop through the result and create Download objects
        while ($downloadData = $result->fetch_assoc()) {
            $download = new Download(
                $downloadData['id'],
                $downloadData['book_id'],
                $downloadData['user_id'],
                $downloadData['created_by'],
                $downloadData['created_at'],
                $downloadData['updated_by'],
                $downloadData['updated_at'],
                $downloadData['deleted']
            );
            $downloads[] = $download;
        }

        return $downloads;
    }

    public function save()
    {
        // Database connection
        $db = include 'config/database.php';

        if ($this->id) {
            // Update an existing record
            $stmt = $db->prepare("UPDATE downloads SET book_id = ?, user_id = ?, updated_by = ?, updated_at = current_timestamp(), deleted = ? WHERE id = ?");

            $stmt->bind_param(
                "ssssi",
                $this->bookId,
                $this->userId,
                $this->updatedBy,
                $this->deleted,
                $this->id
            );
        } else {
            // Insert a new record
            $stmt = $db->prepare("INSERT INTO downloads (book_id, user_id, created_by, created_at, updated_by, updated_at, deleted) VALUES (?, ?, ?, current_timestamp(), ?, current_timestamp(), ?)");

            $stmt->bind_param(
                "sssis",
                $this->bookId,
                $this->userId,
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
        $stmt = $db->prepare("DELETE FROM downloads WHERE id = ?");

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
?>
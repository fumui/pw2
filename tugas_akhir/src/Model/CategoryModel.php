<?php

namespace Model;
class CategoryModel
{
    private $id;
    private $name;
    private $createdBy;
    private $createdAt;
    private $updatedBy;
    private $updatedAt;
    private $deleted;

    public function __construct($id, $name, $createdBy, $createdAt, $updatedBy, $updatedAt, $deleted)
    {
        $this->id = $id;
        $this->name = $name;
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

    public function getName()
    {
        return $this->name;
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
        $stmt = $db->prepare("INSERT INTO categories (id, name, created_by, created_at, updated_by, updated_at, deleted) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("sssssss", $this->id, $this->name, $this->createdBy, $this->createdAt, $this->updatedBy, $this->updatedAt, $this->deleted);

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
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");

        // Bind parameters
        $stmt->bind_param("s", $id);

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        // Check if a category was found
        if ($result->num_rows === 0) {
            return null; // Category not found
        }

        // Get the category data
        $categoryData = $result->fetch_assoc();

        // Create and return Category object
        return new CategoryModel(
            $categoryData['id'],
            $categoryData['name'],
            $categoryData['created_by'],
            $categoryData['created_at'],
            $categoryData['updated_by'],
            $categoryData['updated_at'],
            $categoryData['deleted']
        );
    }

    public static function findAll()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM categories");

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        $categories = [];

        // Loop through the result and create Category objects
        while ($categoryData = $result->fetch_assoc()) {
            $category = new CategoryModel(
                $categoryData['id'],
                $categoryData['name'],
                $categoryData['created_by'],
                $categoryData['created_at'],
                $categoryData['updated_by'],
                $categoryData['updated_at'],
                $categoryData['deleted']
            );
            $categories[] = $category;
        }

        return $categories;
    }

    public function update()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("UPDATE categories SET name = ?, updated_by = ?, updated_at = ? WHERE id = ?");

        // Bind parameters
        $stmt->bind_param("ssss", $this->name, $this->updatedBy, $this->updatedAt, $this->id);

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
        $stmt = $db->prepare("DELETE FROM categories WHERE id = ?");

        // Bind parameters
        $stmt->bind_param("s", $this->id);

        // Execute the query
        $result = $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        return $result;
    }
}

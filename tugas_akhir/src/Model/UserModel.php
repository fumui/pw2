<?php

namespace Model;
class UserModel
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $level;
    private $createdBy;
    private $createdAt;
    private $updatedBy;
    private $updatedAt;
    private $deleted;

    public function __construct($id, $username, $email, $password, $level, $createdBy, $createdAt, $updatedBy, $updatedAt, $deleted)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->level = $level;
        $this->createdBy = $createdBy;
        $this->createdAt = $createdAt;
        $this->updatedBy = $updatedBy;
        $this->updatedAt = $updatedAt;
        $this->deleted = $deleted;
    }

    // Getters and Setters for the User properties

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function isDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    public function save()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("INSERT INTO users (id, username, email, password, level, created_by, created_at, updated_by, updated_at, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("sssssssssi", $this->id, $this->username, $this->email, $this->password, $this->level, $this->createdBy, $this->createdAt, $this->updatedBy, $this->updatedAt, $this->deleted);

        // Execute the query
        $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();
    }

    /**
     * Update the user object in the database.
     */
    public function update()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("UPDATE users SET username=?, email=?, password=?, level=?, updated_by=?, updated_at=?, deleted=? WHERE id=?");

        // Bind parameters
        $stmt->bind_param("ssssssis", $this->username, $this->email, $this->password, $this->level, $this->updatedBy, $this->updatedAt, $this->deleted, $this->id);

        // Execute the query
        $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();
    }

    /**
     * Delete the user object from the database.
     */
    public function delete()
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("DELETE FROM users WHERE id=?");

        // Bind parameters
        $stmt->bind_param("s", $this->id);

        // Execute the query
        $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $db->close();
    }

    /**
     * Find a user by ID in the database and return a User object.
     */
    public static function findById($id)
    {
        // Database connection
        $db = include 'config/database.php';

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM users WHERE id=?");

        // Bind parameters
        $stmt->bind_param("s", $id);

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        // Check if a user was found
        if ($result->num_rows === 0) {
            return null;
        }

        // Get the user data
        $userData = $result->fetch_assoc();

        // Create and return a new UserModel object
        return new UserModel(
            $userData['id'],
            $userData['username'],
            $userData['email'],
            $userData['password'],
            $userData['level'],
            $userData['created_by'],
            $userData['created_at'],
            $userData['updated_by'],
            $userData['updated_at'],
            $userData['deleted']
        );
    }

    /**
     * Get a list of users with pagination and optional search/filter by name and level.
     *
     * @param int $page       The page number.
     * @param int $perPage    The number of users per page.
     * @param string|null $name     The name to search/filter by (optional).
     * @param string|null $level    The level to search/filter by (optional).
     *
     * @return array    The array of UserModel objects.
     */
    public static function getList($page, $perPage, $name = null, $level = null)
    {
        // Database connection
        $db = include 'config/database.php';

        // Calculate the offset
        $offset = ($page - 1) * $perPage;

        // Prepare the query
        $query = "SELECT * FROM users";

        // Add search/filter conditions if provided
        $conditions = [];
        $params = [];

        if ($name) {
            $conditions[] = "username LIKE ?";
            $params[] = "%{$name}%";
        }

        if ($level) {
            $conditions[] = "level = ?";
            $params[] = $level;
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        // Add pagination
        $query .= " LIMIT ?, ?";

        // Prepare the statement
        $stmt = $db->prepare($query);

        // Bind parameters for pagination
        $stmt->bind_param("ii", $offset, $perPage);

        // Bind parameters for search/filter conditions
        for ($i = 0; $i < count($params); $i++) {
            $stmt->bind_param("s", $params[$i]);
        }

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        // Create an array to store the UserModel objects
        $users = [];

        // Loop through the result set and create UserModel objects
        while ($userData = $result->fetch_assoc()) {
            $user = new UserModel(
                $userData['id'],
                $userData['username'],
                $userData['email'],
                $userData['password'],
                $userData['level'],
                $userData['created_by'],
                $userData['created_at'],
                $userData['updated_by'],
                $userData['updated_at'],
                $userData['deleted']
            );

            $users[] = $user;
        }

        // Return the array of UserModel objects
        return $users;
    }

    public static function hashPassword($password, $salt)
    {
        // Concatenate the password and salt
        $saltedPassword = $password . "|" . $salt;

        // Hash the salted password using SHA256
        $hashedPassword = hash('sha256', $saltedPassword);

        return $hashedPassword;
    }

    /**
     * Check username and password for login authentication.
     *
     * @param string $username The username.
     * @param string $password The password.
     *
     * @return UserModel|null   The UserModel object if authentication succeeds, null otherwise.
     */
    public static function login($username, $password)
    {
        // Database connection
        $db = include 'config/database.php';

        // Hash the password
        $hashedPassword = self::hashPassword($password, $username);

        // Prepare the query
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        
        // Bind parameters
        $stmt->bind_param("ss", $username, $hashedPassword);

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Close the statement and database connection
        $stmt->close();
        $db->close();

        // Check if a user was found
        if ($result->num_rows === 0) {
            return null; // UserModel not found
        }

        // Get the user data
        $userData = $result->fetch_assoc();

        // Return UserModel object
        return new UserModel(
            $userData['id'],
            $userData['username'],
            $userData['email'],
            $userData['password'],
            $userData['level'],
            $userData['created_by'],
            $userData['created_at'],
            $userData['updated_by'],
            $userData['updated_at'],
            $userData['deleted']
        );
    }
}

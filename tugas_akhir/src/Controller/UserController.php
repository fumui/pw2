<?php

namespace Controller;

use Model\UserModel;
use Utils\Utils;

class UserController
{
    public function login()
    {
        // Start the session
        session_start();

        // Check if the login form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Perform login authentication
            $user = UserModel::login($username, $password);

            $config = include 'config/settings.php';
            if ($user) {
                // Set the user information in the session
                $_SESSION['user'] = $user;

                // Login successful, redirect to homepage or any other page
                header("Location: $config[base_path]/");
                exit();
            } else {
                header("Location: $config[base_path]/?errCode=0x01");
            }
        }
    }
    
    public function logout()
    {
        // Start the session
        session_start();

        // Unset and destroy the session
        $_SESSION = array();
        session_destroy();

        // Redirect to the login page or any other page
        $config = include 'config/settings.php';
        header("Location: $config[base_path]/");
        exit();
    }

    public function register()
    {
        // Start the session
        session_start();

        // Check if the registration form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $level = 'USER'; // Set the default level to 'USER'
            $createdBy = null; // Set the default created by value
            $createdAt = date('Y-m-d H:i:s'); // Get the current datetime
            $updatedBy = null; // Set the default updated by value
            $updatedAt = date('Y-m-d H:i:s'); // Get the current datetime
            $deleted = false; // Set the default deleted value

            // Create a new UserModel instance
            $user = new UserModel(Utils::generateUUID(), $username, $email, $password, $level, $createdBy, $createdAt, $updatedBy, $updatedAt, $deleted);

            // Save the user to the database
            $user->save();

            // Set the user information in the session
            $_SESSION['user'] = $user;

            // Redirect to homepage or any other page after registration
            $config = include 'config/settings.php';
            // header("Location: $config[base_path]/");
            exit();
        }
    }

}

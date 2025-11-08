<?php
// Include database connection configuration
include("connect.php");

// Handle CREATE operation
if (isset($_POST['create'])) {
    // Sanitize input data to prevent SQL injection
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // SQL query to insert new book into database
    $sql = "INSERT INTO books (title, author, type, description) 
    VALUES ('$title', '$author', '$type', '$description')";
    $query = mysqli_query($conn, $sql);

    // Check if insertion was successful
    if ($query) {
        // Start session and set success message
        session_start();
        $_SESSION['create'] = "Book Added Successfully!";
        // Redirect back to index page
        header('Location: index.php');
    } else {
        die("Something went wrong!");
    }
}

// Handle UPDATE operation
if (isset($_POST['edit'])) {
    // Sanitize input data to prevent SQL injection
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // SQL query to update existing book in database
    $sql = "UPDATE books SET title = '$title', author = '$author',
    type = '$type', description = '$description' WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    // Check if update was successful
    if ($query) {
        // Start session and set success message
        session_start();
        $_SESSION['update'] = "Book Updated Successfully!";
        // Redirect back to index page
        header('Location: index.php');
    } else {
        die("Something went wrong!");
    }
}

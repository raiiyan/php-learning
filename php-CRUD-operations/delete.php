<?php
// Check if an ID parameter is provided in the URL
if (isset($_GET['id'])) {
    // Get the book ID from URL parameter
    $id = $_GET['id'];

    // Include database connection file
    include('connect.php');

    // SQL query to delete the book with specified ID
    $sql = "DELETE FROM books WHERE id=$id";

    // Execute the delete query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Start a new session
        session_start();

        // Set success message in session
        $_SESSION['delete'] = "Book deleted Successfully!";

        // Redirect back to the index page
        header('Location: index.php');
    }
}
// Note: Security improvements that could be made:
// 1. Validate and sanitize the ID parameter
// 2. Add error handling for failed deletions
// 3. Add confirmation before deletion
// 4. Use prepared statements to prevent SQL injection

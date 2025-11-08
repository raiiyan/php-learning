<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags and CSS dependencies -->
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
</head>

<body>
    <!-- Main container for the header -->
    <div class="container">
        <!-- Header section with navigation -->
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>
            <div>
                <!-- Back button to return to book list -->
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
    </div>

    <!-- Container for displaying book details -->
    <div class="book-details my-5">
        <?php
        // Check if book ID is provided in URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Include database connection
            include('connect.php');
            // Query to fetch specific book details
            $sql = "SELECT * FROM books WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
            <!-- Display book information -->
            <h2>Title</h2>
            <p><?php echo $row['title']; ?></p>
            <h2>Category</h2>
            <p><?php echo $row['type']; ?></p>
            <h2>Author Name</h2>
            <p><?php echo $row['author']; ?></p>
            <h2>Book Description</h2>
            <p><?php echo $row['description']; ?></p>

            <!-- Download options section -->
            <div class="mt-4">
                <!-- Links to download book details in different formats -->
                <a href="download.php?id=<?php echo $row['id']; ?>&format=csv" class="btn btn-success me-2">Download CSV</a>
                <a href="download.php?id=<?php echo $row['id']; ?>&format=pdf" class="btn btn-danger">Download PDF</a>
            </div>

        <?php
        } else {
            // Display error message if no book ID is provided
            echo "<p>No book found.</p>";
        }
        ?>
    </div>
</body>

</html>
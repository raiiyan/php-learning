<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS CDN link for styling -->
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
</head>

<body>
    <div class="container">
        <!-- Header section with title and action buttons -->
        <header class="d-flex justify-content-between my-4 align-items-center">
            <h1>Book List</h1>
            <div class="d-flex gap-2">
                <!-- Navigation buttons for adding books and downloading data -->
                <a href="create.php" class="btn btn-primary">Add new book</a>
                <a href="download_all.php?format=csv" class="btn btn-success">Download CSV</a>
                <a href="download_all.php?format=pdf" class="btn btn-danger">Download PDF</a>
            </div>
        </header>

        <?php
        // Start session to handle flash messages
        session_start();

        // Display success messages for create/edit/delete operations
        // These messages are stored in session variables and displayed only once
        if (isset($_SESSION['create'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['create'] . "</div>";
            unset($_SESSION['create']);
        }

        if (isset($_SESSION['edit'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['edit'] . "</div>";
            unset($_SESSION['edit']);
        }

        if (isset($_SESSION['delete'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['delete'] . "</div>";
            unset($_SESSION['delete']);
        }
        ?>

        <!-- Table to display book listings -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include("connect.php");

                // Query to fetch all books from database
                $sql = "SELECT * FROM books";
                $result = mysqli_query($conn, $sql);

                // Check if any books exist in the database
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each book and display its details
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['author']}</td>
                            <td>{$row['type']}</td>
                            <td>
                                <!-- Action buttons for each book -->
                                <a href='view.php?id={$row['id']}' class='btn btn-info btn-sm'>Read More</a>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    // Display message if no books are found
                    echo "<tr><td colspan='5' class='text-center'>No books found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
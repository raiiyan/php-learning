<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS and custom styling -->
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit book</title>
</head>

<body>
    <div class="container">
        <!-- Header section with navigation -->
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Book</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <?php
        // Check if book ID is provided in URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Include database connection
            include('connect.php');

            // Fetch book details from database
            $sql = "SELECT * FROM books WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        ?>
            <!-- Form for editing book details -->
            <form action="process.php" method="post">
                <!-- Book Title input field -->
                <div class="form-element mt-5">
                    <label class="form-label fw-bold ms-2">
                        Book Title
                    </label>
                    <input type="text" class="form-control" name="title"
                        value="<?php echo $row['title'] ?>"
                        placeholder="Enter book title">
                </div>

                <!-- Author Name input field -->
                <div class="form-element my-3">
                    <label class="form-label fw-bold ms-2">
                        Author Name
                    </label>
                    <input type="text" class="form-control" name="author"
                        value="<?php echo $row['author'] ?>"
                        placeholder="Enter author name">
                </div>

                <!-- Book Type dropdown with pre-selected value -->
                <div class="form-element my-3">
                    <label class="form-label fw-bold ms-2">
                        Book Type
                    </label>
                    <br>
                    <select name="type" class="form-control">
                        <option value="">Select Book Category</option>
                        <!-- Options with conditional selected state -->
                        <option value="Adventure" <?php if ($row['type'] == "Adventure") {
                                                        echo "selected";
                                                    } ?>>Adventure</option>
                        <option value="Fantasy" <?php if ($row['type'] == "Fantasy") {
                                                    echo "selected";
                                                } ?>>Fantasy</option>
                        <option value="Horror" <?php if ($row['type'] == "Horror") {
                                                    echo "selected";
                                                } ?>>Horror</option>
                        <option value="Sci-Fi" <?php if ($row['type'] == "Sci-Fi") {
                                                    echo "selected";
                                                } ?>>Sci-Fi</option>
                    </select>
                </div>

                <!-- Book Description input field -->
                <div class="form-element my-3">
                    <label class="form-label fw-bold ms-2">
                        Book Description
                    </label>
                    <input type="text" class="form-control" name="description"
                        value="<?php echo $row['description'] ?>"
                        placeholder="Enter book description">
                </div>

                <!-- Hidden field to store book ID -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <!-- Submit button -->
                <div class="form-element my-3">
                    <input type="submit" class="btn btn-success" name="edit"
                        value="Edit Book">
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>
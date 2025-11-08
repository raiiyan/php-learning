<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new book</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Book</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <div class="form-element mt-5">
                <label class="form-label fw-bold ms-2">
                    Book Title
                </label>
                <input type="text" class="form-control" name="title"
                    placeholder="Enter book title">
            </div>
            <div class="form-element my-3">
                <label class="form-label fw-bold ms-2">
                    Author Name
                </label>
                <input type="text" class="form-control" name="author"
                    placeholder="Enter author name">
            </div>
            <div class="form-element my-3">
                <label class="form-label fw-bold ms-2">
                    Book Type
                </label>
                <br>
                <select name="type" class="form-control">
                    <option value="">Select Book Category</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                </select>
            </div>
            <div class="form-element my-3">
                <label class="form-label fw-bold ms-2">
                    Book Description
                </label>
                <input type="text" class="form-control" name="description"
                    placeholder="Enter book description">
            </div>
            <div class="form-element my-3">
                <input type="submit" class="btn btn-success" name="create"
                    value="Add Book">
            </div>
            <button class="btn btn-"></button>
        </form>
    </div>
</body>

</html>
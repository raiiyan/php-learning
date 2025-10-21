<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>



    <div class="container">
        <div class="heading">
            <h1>Don't have an account?</h1>
            <h4>Register here</h4>
        </div>

        <?php

        if (isset($_POST['submit'])) { // validate form submission
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRetype = $_POST['retype_password'];

            // password hashing
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $errors = array(); // an empty array to store errors

            if (empty($fullname) || empty($email) || empty($password) || empty($passwordRetype)) {
                $errors[] = "All fields are required!";
            }
            // email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email.";
            }
            // password not less than 8 digits
            if (strlen($password < 8)) {
                $errors[] = "Password must be 8 characters.";
            }
            // match password
            if ($password !== $passwordRetype) {
                $errors[] = "Password does not match.";
            }
            require_once "database.php"; // establish database connection
            // check for existing email
            $sql = "SELECT * FROM users WHERE email = '$email'"; // query to find the existing email in the db
            $result = mysqli_query($conn, $sql);
            $countRow = mysqli_num_rows($result);
            if ($countRow > 0) {
                $errors[] = "Email already exists!";
            }
            // display error alert
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class = 'alert alert-danger' >$error</div>";
                }
            } else {
                // insert data into database

                $sql = "INSERT INTO users (full_name, email, password) VALUES (?,?,?)"; // query to insert the registration data into the db
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class = 'alert alert-success'>Registration successful!</div>";
                } else {
                    die("Something went wrong. Please try again.");
                }
            }
        }


        ?>

        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="retype_password" placeholder="Confirm password">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary w-100" value="Register" name="submit">
            </div>
        </form>
        <div>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

    <script>
        // auto-hide alerts after a few seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => el.remove());
        }, 4000);
    </script>
    </div>
</body>

</html>
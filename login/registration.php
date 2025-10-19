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
        require_once "database.php";

        if (isset($_POST['submit'])) {
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRetype = $_POST['retype_password'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRetype)) {
                $errors[] = "All fields are required";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
            if (strlen($password) < 8) {
                $errors[] = "Password must be at least 8 characters long";
            }
            if ($password !== $passwordRetype) {
                $errors[] = "Passwords do not match";
            }

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                $errors[] = "Email already exists";
            }

            // if there are any errors → store and redirect
            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password_hash);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['success'] = "Registration successful";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    die("Something went wrong");
                }
            }
        }

        // show messages (and clear after display)
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            unset($_SESSION['errors']); // clear after one reload
        }

        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']); // clear after one reload
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
        // Optional: auto-hide alerts after a few seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => el.remove());
        }, 4000);
    </script>
    </div>
</body>

</html>
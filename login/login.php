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
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="heading">
            <h1>Already have an account?</h1>
            <h4>Login here</h4>
        </div>

        <?php

        // Clear old messages on reload
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once 'database.php';

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = "yes";
                    header("Location: index.php");
                    die();
                } else {
                    $_SESSION['error'] = "<div class='alert alert-danger'>Wrong password</div>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            } else {
                $_SESSION['error'] = "<div class='alert alert-danger'>Email not found</div>";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter your email" required name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter password" name="password" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary w-100" value="Login" name="login">
            </div>
        </form>
        <div>
            <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </div>
    </div>
</body>

</html>
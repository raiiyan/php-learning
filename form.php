<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h2>Please write your name here:</h2>
        <input type="text" name="name" id="">
        <input type="submit" name="submit" id="">
    </form>
    <?php
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        echo "<h3>Hello " . $name . ".</h3>";
    }
    ?>
</body>

</html>
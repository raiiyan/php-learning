<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
        method="post">
        <input type="number" name="num01" placeholder="number one">
        <select name="operator" id="">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
            <option value="modulus">%</option>
        </select>
        <input type="number" name="num02" placeholder="number two">
        <button>Calculate</button>
    </form>


    <?php
    // grab data from form
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $num01 = filter_input(
            INPUT_POST,
            "num01",
            FILTER_SANITIZE_NUMBER_FLOAT
        );
        $num02 = filter_input(
            INPUT_POST,
            "num02",
            FILTER_SANITIZE_NUMBER_FLOAT
        );
        $operator = htmlspecialchars($_POST['operator']);

        // error handler

        $error = false;
        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p class='calc-error'>fill in all fields</p>";
            $error = true;
        }
        if (!is_numeric($num01) || !is_numeric($num01)) {
            echo "<p class='calc-error'>type only numbers</p>";
            $error = true;
        }

        // calculate the numbers if no error
        if (!$error) {
            $value = 0;
            switch ($operator) {
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
                case "modulus":
                    $value = $num01 % $num02;
                    break;
                default:
                    echo "something went wrong!";
            }
            echo "Result = " . $value;
        }
    }

    ?>

</body>

</html>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);

    if(empty($name)){
        exit();
        header('Location: ../index.php');
    }

    echo "This are the data that user submitted:";
    echo "<br>";
    echo $name;
    echo "<br>";
    echo $price;
    echo "<br>";
    echo $quantity;
    echo "<br>";

    
}
<?php
class Person {
  public function __construct() {
    echo "Object created!<br>";
  }
  public function __destruct() {
    echo "Object destroyed!";
  }
}

$p = new Person();
?>
<?php
class Animal {
  function sound() {
    echo "Some sound";
  }
}

class Dog extends Animal {
  function sound() {
    echo "Bark";
  }
}

$dog = new Dog();
$dog->sound();
?>
<?php
class Car {
  public $brand;

  function setBrand($brand) {
    $this->brand = $brand;
  }

  function getBrand() {
    return $this->brand;
  }
}

$car1 = new Car();
$car1->setBrand("Toyota");
echo $car1->getBrand();
?>
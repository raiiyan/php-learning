<?php
class Student {
  public $name;
  public $grade;

  function showInfo() {
    echo "$this->name is in grade $this->grade.";
  }
}

$st = new Student();
$st->name = "Raiyan";
$st->grade = "A";
$st->showInfo();
?>
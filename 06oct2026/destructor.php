<?php
class Fruit {
  public $name;
  public $color;

  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
    echo " i am ready" . "<hr>";
  }

  function __destruct() {
    echo " okay bye";
  }
}

$apple = new Fruit('Apple', 'Red');
// $banana = new Fruit('Banana', 'Yellow');
?>
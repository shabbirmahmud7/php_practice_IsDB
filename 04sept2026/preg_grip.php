<?php
$foods = array("pasta", "steak", "fish", "potatoes");
$food = preg_grep("/k$/", $foods);
print_r($food);
?>
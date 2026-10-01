<?php 

class MyClass {
    //property
    public $name;
    public $age;
    //Method
    function welcome(){
        // return "Hello";
         echo "Hello" . $this->name . "<br>";
         echo $this->age . "<br>";
        
    }
} 

    $obj1 = new MyClass;
    $obj1->name ="Shabbir";
    $obj1->age = 23;
    $obj1->welcome();
    
    // var_dump($obj1);
    // echo "<pre>";
    
    $obj2 = new MyClass;
    $obj2->name ="Rokon";
    $obj2->age = 25;
    $obj2->welcome();

    // var_dump($obj2);
    // echo "<pre>";


    

?>
<?php 

class MyClass {
    //
    //property piblic protected private
    public $name;
    public $age;
    //Method
    function welcome(){
        // return "Hello";
         echo "Hello" . $this->name . "<br>";
        //  echo $this->age . "<br>";
        
    }
} 

    $obj1 = new MyClass;
    $obj1->name ="Shabbir";
    $obj1->age = 23;
   
 


    

?>
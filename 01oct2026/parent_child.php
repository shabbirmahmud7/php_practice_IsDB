<?php 
//parent class
class MyClass {
    
    //property piblic protected private
    public $name;
    protected $age;
    //Method
    function welcome(){
        // return "Hello";
         echo "Hello" . $this->name . "<br>";
        //  echo $this->age . "<br>";
        
    }
} 

    class child_one extends MyClass {
    $this->age = 30;
    }




    $obj1 = new MyClass;
    $obj1->name ="Shabbir";
    // $obj1->age = 23;
   
 


    

?>
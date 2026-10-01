<?php
    class Employee
{

    private $name;
    private $title;
    //Getter Function
    public function getName() {
        return $this->name;
}
//setter Function
    public function setName($name) {

        $this->name = $name;
}

    public function sayHello() {

        echo "Hi, my name is {$this->getName()}.";
}

} //end of class

    $emp1 = new Employee;
    
    $emp1->setName("Rokon");
    // echo $emp1->getName();
   
    // var_dump($emp1)
    $emp1->sayHello();

?>
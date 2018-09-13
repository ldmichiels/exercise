<?php

abstract class Employee
{
    protected $id;
    protected $name;
    protected $surname;
    protected $age;

    /**
     * @param string $name Name of the employee
     * @param string $surname Surname of the employee
     * @param int $age Age of the employee
     */
    public function __construct($name, $surname, $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
    
    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $value)
    {
        $this->$prop = $value;
    }

    public abstract function __tostring();
}

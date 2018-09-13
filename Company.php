<?php

class Company
{
    private $id;
    private $name;
    private $employees_list;

    public function __construct($n)
    {
        $this->employees_list = [];
        $this->name = $n;
        $this->id = $this->generateId();
    }

    /**
     * Adds an employee to the employees list
     */
    public function addEmployee($employee)
    {
        //..
    }

    /**
     * Returns an instance of Employee with the searched id
     * 
     * @param int|string $id
     * @return Employee 
     */
    public function getEmployee($id)
    {
        //..
    }

    /**
     * Returns the list of all employees in the company
     * 
     * @return string The list of all employees
     */
    public function getAllEmployees()
    {
        return "";
    }

    /**
     * Returns the average age of all company employees
     * @return double Average age of all employees
     */
    public function averageAge()
    {
        //..
    }

    /**
     * Returns an unique id
     */
    private function generateId()
    {
        // This method would get an unique id from database sequence, for example
        return rand(1, 100);
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $value)
    {
        $this->$prop = $value;
    }
}

?>
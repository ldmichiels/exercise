<?php

namespace Excercise;

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
    public function addEmployee(Employee $employee)
    {
        $this->employees_list[] = $employee;
    }

    /**
     * Returns an instance of Employee with the searched id
     * 
     * @param int|string $id
     * @return Employee 
     */
    public function getEmployee($id)
    {
        // The following code use two vars to avoid "PHP Notice: Only variables should be passed by reference"
        $all_found = array_filter($this->employees_list, function(Employee $employee) use ($id) {
            return ($employee->id == $id);
        });
        $found = array_pop($all_found);
        return $found;
    }

    /**
     * Returns the list of all employees in the company
     * 
     * @return string The list of all employees
     */
    public function getAllEmployees()
    {
        $str_employees = array_map(function($employee) {
                return (string)$employee; // __toString method
            }
            ,$this->employees_list);
        return $str_employees;
    }

    /**
     * Returns the average age of all company employees
     * @return double Average age of all employees
     */
    public function getAverageAge()
    {
        $sum = array_reduce($this->employees_list, function($carry, Employee $employee) {
                return $carry + $employee->age;
            }
            , 0);
        return $sum / count($this->employees_list);
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
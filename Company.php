<?php

namespace Excercise;

class Company
{
    private $id;
    private $name;
    private $employees_list;

    public function __construct($name)
    {
        $this->employees_list = [];
        $this->name = $name;
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
     * Returns an instance of Employee with the searched id or null if the company have no employees
     * 
     * @param int|string $id
     * @return Employee|null
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
     * @return array The list of all employees
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
     * @return string The text list of all employees
     */
    public function getAllEmployeesTextList()
    {
        return implode(PHP_EOL, $this->getAllEmployees());
    }

    /**
     * Returns the average age of all company employees
     * @return double Average age of all employees or zero if the company have no employees
     */
    public function getAverageAge()
    {
        if (empty($this->employees_list)) {
            return 0;
        }
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
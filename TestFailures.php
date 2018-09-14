<?php

namespace Excercise;
use TypeError;
use Exception;

    include("Employee.php");
    include("Developer.php");
    include("Designer.php");
    include("Company.php");

    function printParagraph($msg = "") {
        echo "<p>$msg</p>";
    }

    function printTitle($msg = "") {
        echo "<h3>$msg</h3>";
    }

    printTitle("Creating Summa company...");
    $summa = new Company("Summa");
    $mike = new Developer("Mike", "Bostock", 38, Developer::PYTHON);
    $mark = new Designer("Mark", "Otto", 35, Designer::WEB);
    
    $summa->addEmployee($mike);
    $summa->addEmployee($mark);
    printParagraph( implode("<br>", $summa->getAllEmployees()) );

    printTitle("Trying to add a non-Employee to the company");
    try {
        $summa->addEmployee([]);
    }
    catch (TypeError $e) {
        printParagraph($e->getMessage());
    }
    printParagraph( implode("<br>", $summa->getAllEmployees()) );

    printTitle("Trying to create a Developer with an invalid language");
    try {
        $non_dev = new Developer("John", "Doe", 27, "Javascript");
        printParagraph( $non_dev ); // This never runs
    }
    catch (Exception $e) {
        printParagraph($e->getMessage());
    }

    printTitle("Trying to create a Designer with an invalid type");
    try {
        $non_des = new Designer("John", "Doe", 27, "Videogame");
        printParagraph( $non_des ); // This never runs
    }
    catch (Exception $e) {
        printParagraph($e->getMessage());
    }

    printTitle("Checking the results when company has no employees");
    $no_company = new Company("");
    printParagraph( "Get all employees is an empty array: " );
    var_dump($no_company->getAllEmployees());
    printParagraph( "The employees text list is empty too: " );
    var_dump($no_company->getAllEmployeesTextList());
    printParagraph( "Average age is " . $no_company->getAverageAge() . " because has no employees.");
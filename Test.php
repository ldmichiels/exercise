<?php

namespace Excercise;

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
    printParagraph( $summa->name );
    // Summa

    printTitle("Changing the company name...");
    $summa->name = "Summa Solutions";
    printParagraph( $summa->name );
    // Summa Solutions

    printTitle("Creating Mike as developer...");
    $mike = new Developer("Mike", "Bostock", 38, Developer::PYTHON);
    printParagraph( "$mike->surname, $mike->name ($mike->age) - $mike->language" );
    // Bostock, Mike (38)

    printTitle("Creating Mark as designer...");
    $mark = new Designer("Mark", "Otto", 35, Designer::WEB);
    printParagraph( "$mark->surname, $mark->name ($mark->age) - $mark->type" );
    // Otto, Mark (35)

    printTitle("Adding both employees to Summa");
    $summa->addEmployee($mike);
    $summa->addEmployee($mark);
    printParagraph( implode("<br>", $summa->getAllEmployees()) );

    printTitle("Changing id and searching the employee");
    $id = 99;
    $mark->id = $id;
    printParagraph("Mark id is now: $mark->id");
    $employee = $summa->getEmployee($id);
    printParagraph( (string) $employee );

    printTitle("Checking the average age in the company");
    printParagraph("The average age in company is " . $summa->getAverageAge() . " years old");


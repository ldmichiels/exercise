<?php

    include("Employee.php");
    include("Developer.php");
    include("Designer.php");
    include("Company.php");

    $summa = new Company("Summa");
    echo $summa->name;
    // Summa

    $summa->name = "Summa Solutions";
    echo $summa->name;
    // Summa Solutions

    $mike = new Developer("Mike", "Bostock", 38, Developer::PYTHON);
    echo "$mike->surname, $mike->name ($mike->age)";
    // Bostock, Mike (38)

    $mark = new Designer("Mark", "Otto", 35, Designer::WEB);
    echo "$mark->surname, $mark->name ($mark->age)";
    // Otto, Mark (35)

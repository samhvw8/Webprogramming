<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 2/21/17
 * Time: 9:57 AM
 */


$array = [
    '20161001' => [
        'name' => 'Peter', 'math' => 5, 'physics' => 6, 'chemistry' => 5
    ],
    '20161002' => [
        'name' => 'Tom', 'math' => 9, 'physics' => 7, 'chemistry' => 4
    ],
    '20161003' => [
        'name' => 'Michelle', 'math' => 8, 'physics' => 8, 'chemistry' => 9
    ],
    '20161004' => [
        'name' => 'Daniel', 'math' => 3, 'physics' => 5, 'chemistry' => 5
    ]
];


foreach ($array as $key => $value) {

    $value['avg'] = ($value['math'] + $value['physics'] + $value['chemistry']) / 3;
    $array[$key] = $value;
}


echo "<style> table {  border-collapse: collapse; } table, td, th { border: 1px solid black; } </style>";

function cmp($a, $b)
{

    $checkFailA = checkFail($a);
    $checkFailB = checkFail($b);

    if ($checkFailA != $checkFailB) {
        if ($checkFailA)
            return -1;
        else
            return 1;
    }

    if ($a['avg'] == $b['avg']) {
        return 0;
    }
    return ($a['avg'] < $b['avg']) ? -1 : 1;
}

function checkFail($student)
{

    if ($student['math'] < 5)
        return true;

    if ($student['physics'] < 5)
        return true;

    if ($student['chemistry'] < 5)
        return true;

    return false;
}


function printTable($array)
{

    echo "<table>";

    echo "<tr>";

    echo "<th>Student ID</th>";
    echo "<th>Math</th>";
    echo "<th>Physic</th>";
    echo "<th>Chemistry</th>";
    echo "<th>Avg</th>";
    echo "<th>FAIL/PASS</th>";

    echo "</tr>";

    foreach ($array as $key => $value) {


        foreach ($value as $subj) {
            echo "<td>$subj</td>";
        }

        echo "<td>";
        if (checkFail($value)) {
            echo "<span style='color:red'><b>FAIL</b></span><br>";
        } else {
            echo "<span style='color:blue'><b>PASS</b></span><br>";
        }
        echo "</td>";

        echo "</tr>";


    }

    echo "</table>";
}

printTable($array);


echo "<span style='color:cornflowerblue'><b>Before sort</b></span><br>";


uasort($array, "cmp");

echo "<span style='color:cornflowerblue'><b>After sort</b></span><br>";

printTable($array);
<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/7/17
 * Time: 11:10 AM
 */

$servername = "localhost";
$username = "root";
$password = "1";
$database = "bkshop";

/**
 * Query SQL
 * @param $sql sql string
 * @return bool|mysqli_result
 */
function query($sql)
{

    // Create connection
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    $conn->close();

    return $result;
}
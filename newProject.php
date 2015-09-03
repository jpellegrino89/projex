<?php
/**
 * Created by PhpStorm.
 * User: jpellegrino
 * Date: 9/2/15
 * Time: 8:15 PM
 */

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "projex";


$con = new mysqli($servername, $username, $password, $dbname);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}


$sql="INSERT INTO projects (name, due_date)
VALUES
('$_POST[project_name]','$_POST[dueDate]')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con -> close();
?>
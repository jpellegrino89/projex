<?php
/**
 * Created by PhpStorm.
 * User: jpellegrino
 * Date: 8/30/15
 * Time: 8:39 PM
 */
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "projex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
    echo "<br/>";
}


//SQL Query for all projects
$sql = "SELECT name from projects";
$result = $conn -> query($sql);
echo "<form name='projectList' action="
echo "<select name='ddlProjects'>";
echo "<option value=''>All Projects</option>";

if ($result -> num_rows > 0){
    //output each row
    while($row = $result -> fetch_assoc()){
        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
}

else{
    echo "You have no projects";
}
echo "</select>";
$conn -> close();


?>
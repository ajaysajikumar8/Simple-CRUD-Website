<head>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    

<?php

include "navigation.php";

$name = $_POST["name"];
$lname = $_POST["lname"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$address = $_POST["address"];

//config
$server = "localhost";
$user = "root";
$password = ""; 
$database = "sample_db";

//Establishing a connection to MYSQL server.
$connection = mysqli_connect($server,$user,$password, $database);

//Sql command
$sql_command = "INSERT INTO person(id, name, lastname, telephone, email, address)
VALUES (NULL, '$name', '$lname', '$telephone', '$email', '$address')";     

//check sql commands
if (mysqli_query($connection, $sql_command)){
    echo "SQL Command OK ! <br><br>";
}

$sql_command = "SELECT * FROM person";     
$action = mysqli_query($connection, $sql_command);

echo "<h1>Report</h1>";
echo "<table><tr>";
echo "<th>id</th>";
echo "<th>name</th>";
echo "<th>lastname</th>";
echo "<th>telephone</th>";
echo "<th>email</th>";
echo "<th>address</th></tr>";

while ($line = mysqli_fetch_assoc($action)){
    echo "<tr><td>" . $line["id"] . "</td>" .
    "<td>" . $line["name"] . "</td>" .
    "<td>" . $line["lastname"] . "</td>" .
    "<td>" . $line["telephone"] . "</td>" .
    "<td>" . $line["email"] . "</td>" .
    "<td>" . $line["address"] . "</td>" .
    "</tr>";
}
echo "</table>";
?>
<br>


</body>
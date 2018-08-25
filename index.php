<?php
session_start(); 
require_once "pdo.php";

$attempt = 'Attempt to go to <a href="add.php">add.php</a> without logging in - this should fail with an error message.<br/><br/>';
$login = '<p><a href="login.php">Please log in</a></p>';
$logout = '<p><a href="logout.php">Log Out</a></p>';
$add =  '<a href="add.php">Add New Entry</a>';
$norows = 'No rows found';

?>

<!DOCTYPE>  
<html>
<head>
    <meta content="Building Database Applications in PHP Week 5 Assignment">
    <meta charset="UTF-8">
    <title>Automobile Database Rebecca Lain  66cf2135</title>
</head>
<body>
    <main>
    <div class="main_page">
    <h1>Welcome to Rebecca's Automobile Database</h1>

<?php
if ( isset($_SESSION['error']) ) {
    echo('<p style="color: orange;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']); //Flash message code
}
if ( isset($_SESSION['success']) ) {
    echo('<p style="color: lightgreen;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']); //Flash message code
}

?>

<?php

if (isset($_SESSION['name'])) { 
echo('<table border="1">'."\n");
include 'pdo.php';
$stmt = $pdo->query("SELECT autos_id, make, model, year, mileage FROM autos");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
echo "<tr><td>";
echo (htmlentities ($row['make']));   //This prevents HTML Injection into the form
echo "</td><td>";
echo (htmlentities ($row['model']));
echo "</td><td>";
echo (htmlentities ($row['year']));
echo "</td><td>";
echo (htmlentities ($row['mileage']));
echo "</td><td>";
echo ('<a href="edit.php?autos_id='.($row['autos_id']).'">Edit</a> |');
echo ('<a href="delete.php?autos_id='.($row['autos_id']).'">Delete</a>');
echo "</td></tr>\n";
    }

if (empty($row) =="0") {
    echo ('<p style="color: orange;">'.$norows."</p>\n"); 
}

echo $add;
echo $logout;

}

if (!isset($_SESSION['name'])) {
echo $attempt;
echo $login;
}


?>
    </div>
   
    </main>
</body>

<style>

main {
    border-style: solid;
   border-color: white;
    border-width: 2px;
    margin: 50px;
    padding: 50px;
}


body {

    font-family: didot;
    text-align: center;
    background-color: #294b82;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    

}

table {
    display: flex;
    justify-content: center;
}

h1 {
    font-weight: strong;
    
}

a {
    color: #60c8db;
    text-decoration: none;

}

a:hover {
    color: white;
}

</style>
</html>


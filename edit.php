<?php 
session_start(); 
require_once "pdo.php";

if ( ! isset($_SESSION['name']) ) {
    die('ACCES DENIED');
    }

if ( isset($_SESSION['cancel']) ) {
    $_SESSION['cancel'] = $_POST['cancel'];
    header('Location: index.php');
    return;
}

if (! isset($_GET['autos_id']) ) {
    $_SESSION['error'] = 'Missing auto id';
    header('Location:index.php');
    return;
    
}

//Guardian: Make sure the Autos_ID is present
$stmt = $pdo ->prepare("SELECT make, year, model, autos_id FROM autos WHERE autos_id = :ad");  
        $stmt->execute(array(":ad" => $_GET['autos_id']));
        $row = $stmt ->fetch(PDO::FETCH_ASSOC);
        if ($row == false){
            $_SESSION['error'] = "Bad value for autos_id";
            header('Location:index.php');
            return;
}

if ( isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage']) )
 {   if ( !is_NUMERIC($_POST['year']) or !is_NUMERIC($_POST['mileage']))  //This or is very important! 
         { $_SESSION['error'] = "Mileage and year must be numeric";
            header("Location: edit.php?autos_id=".$_REQUEST['autos_id']);
            error_log("Mileage and year must be numeric ".$_POST['year']);
            return;
         }

    else {
        $sql = "UPDATE autos SET make = :mk, model = :md, year = :yr, mileage = :mi WHERE autos_id = :autos_id";
        $stmt = $pdo->prepare($sql);     
        $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':md' => $_POST['model'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'],
            ':autos_id' => $_POST['autos_id']));
            $_SESSION['success'] = "Record updated";
            header("Location: index.php");
            return;
       
        }

    if (( strlen($_POST['make']) < 1 ) or ( strlen($_POST['model']) < 1 ) or ( strlen($_POST['year']) < 1 ) or ( strlen($_POST['mileage']) < 1 ))
    {
        {    $_SESSION['error'] = "All fields are required";
        header("Location: edit.php?autos_id=".$_REQUEST['autos_id']);
        error_log("Not all fields entered ".$_POST['make']);
        return;

    }

 }

}

//Allows the form details to be viewed  = Lexical Scoping, very important to define EVERYTHING that is not a Global Variable
$sqlt = $pdo->query("SELECT autos_id, make, model, year, mileage FROM autos");
while ($row = $sqlt->fetch(PDO::FETCH_ASSOC) ) {
$m = htmlentities($row['make']);
$md = htmlentities($row['model']);
$y = htmlentities($row['year']);
$mi = htmlentities($row['mileage']);
$autos_id = $row['autos_id'];
}


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
<h3>Editing Automobile</h3>
<form method="post">
Make:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="make" size="25" value="<?= $m ?>"><br/>
Model:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="model" size="25" value="<?= $md ?>"><br/>
Year:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="integer" name="year" size="25" value="<?= $y ?>"><br/>
Mileage:&nbsp<input type="integer" name="mileage" size="25" value="<?= $mi ?>"><br/>
<input type="hidden" name="autos_id" value="<?= $autos_id ?>">
<input type="submit" name="add" id="submit" value="Save">
<input type="submit" name="cancel" id="cancel" value="Cancel"><br/><br/>
</form>
<?php

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: orange;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']); //Flash message code
}
?>
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

.game_results {
    color: #edf0f4;
    font-family: didot;
}

#submit {
    font-family: didot;
    border-radius: 2px;
    text-decoration: none;
    border: none;
    background-color: #efefef;
}

#cancel {
    font-family: didot;
    border-radius: 2px;
    text-decoration: none;
    border: none;
    background-color: #c6c4c4;
}

#dropdown {
    font-family: didot;
}

</style>
</html>

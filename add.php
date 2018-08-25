<!--Code complete 25-06-2018-->
<?php 
//This line is crucial to use $_SESSION and should be used on every file
session_start(); 

//Saves the Grant Access details on a separate document.
require_once "pdo.php";

//This is looking for the login entry. If no details provided then end 'Name parameter missing'
if ( ! isset($_SESSION['name']) ) {
   die('ACCES DENIED');
   }

//Make sure the value entered here matches the "name" in the form input. Capitals matter!!
if ( isset($_POST['cancel']) ) {
    header('Location: index.php');
    return;
}

//The Logic for whether an entry should be submitted to the database or not:


if ( isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage'])  )
 {//Main DIV start 
    if (( strlen($_POST['make']) < 1 ) or ( strlen($_POST['model']) < 1 ) or ( strlen($_POST['year']) < 1 ) or ( strlen($_POST['mileage']) < 1 ) ) {
        $_SESSION['error'] = "All fields are required";
        header("Location: add.php");
        error_log("Field entry fail ");
        return;
    } 

    if ( !is_NUMERIC($_POST['year']))  
         { $_SESSION['error'] = "Year must be numeric";
            header("Location: add.php");
            error_log("Year not numeric ".$_POST['year']);
            return;
    }

    if ( !is_NUMERIC($_POST['mileage']))  
    { $_SESSION['error'] = "Mileage must be numeric";
       header("Location: add.php");
       error_log("Mileage not numeric ".$_POST['mileage']);
       return;
}
 

    else {
        $sql = 'INSERT INTO autos(make, model, year, mileage) VALUES ( :mk, :md, :yr, :mi)';
        $stmt = $pdo->prepare($sql);     
        $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':md' => $_POST['model'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage']));
        $_SESSION['success'] = "Record added";
        header("Location: index.php");
        return;
       
        }

}//Main DIV end
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
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome to the game ";
    echo htmlentities($_REQUEST['name']);
    echo "!</p>\n";
}
?>
<form method="post">
Make:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="make" size="25"><br/>
Model:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="model" size="25"><br/>
Year:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="integer" name="year" size="25"><br/>
Mileage:&nbsp;<input type="integer" name="mileage" size="25"><br/>
<input type="hidden" name="autos_id">
<input type="submit" name="add" id="submit" value="Add New Entry">
<input type="submit" name="cancel" id="cancel" value="Cancel"><br/><br/>
</form>
<?php
if ( isset($_SESSION['error']) ) {
    echo('<p style="color: orange;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
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

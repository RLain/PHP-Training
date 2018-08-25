<?php 

//This page is auto-setting Bad Values for autos_id. Work out why !!!! TO DO !!!!!
require_once "pdo.php";
session_start(); 

if (! isset($_GET['autos_id']) ) {
    $_SESSION['error'] = 'Missing auto id';
    header('Location:index.php');
    return;
    
}

//Guardian: Make sure the preconditions to delete is ok before submitting.
if (isset($_POST['delete']) && isset($_POST['autos_id']) ) {
    $sql = "DELETE FROM autos WHERE autos_id = :zip";    
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['autos_id']));
    $_SESSION['success'] = "Record Deleted";
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

        

?>
<!DOCTYPE>
<html>
<head>
    <meta content="Building Database Applications in PHP Week 5 Assignment">
    <meta charset="UTF-8">
    <title>Rebecca's Automobile Database Week 5 e430ad64</title>
</head>
<body>
<main>
Confirm: Deleting <h3><p style="color:#f2f2f7"><strong><?= htmlentities($row['make'])." - ".($row['model'])." - ".($row['year'])?></strong></p></h3>

<form method="post">
<input type="hidden" name="autos_id" value="<?= $row['autos_id'] ?>">
<input type="submit" name="delete" id="submit" value="Delete">
</form>

<a href="index.php">Cancel</a>

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

table {
    display: flex;
    justify-content: center;

}

a {
    color: #60c8db;
    text-decoration: none;

}

a:hover {
    color: white;
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
</style>
</html>

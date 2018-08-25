<!--Code complete 25-06-2018-->
<?php 
//This line is crucial to use $_SESSION and should be used on every file
session_start(); 
require_once "pdo.php";

  // Redirect the browser to the homepage
if ( isset($_POST['cancel'] ) ) {
    $_SESSION['cancel'] = $_POST['cancel'];
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123


if(isset($_POST['email']) && isset($_POST['pass'])) {
   unset($_SESSION['name']); //This logs out the current user
  if ((strlen($_POST['email']) <1) && (strlen($_POST['pass']) <1 )) {   
    $_SESSION['error'] = "User name and password are required";
    header("Location: login.php");
    error_log("Login fail "." $check");
    return;
} elseif (!strpos($_POST['email'],'@')) {
    $_SESSION['error'] = "Email must have an at-sign (@)";
    header("Location: login.php");
    error_log("Login fail ".$_POST['email']." $check");
    return;  
} elseif (
    $check = hash('md5', $salt.$_POST['pass'])) {

if ($check == $stored_hash) {
    $_SESSION['success'] = "Login Success";
    $_SESSION['name'] = $_POST['email'];
    header("Location: index.php");
    error_log("Login success ".$_POST['email']);
    return;
} 
else {    
    $_SESSION['error'] = "Incorrect password";
    header("Location: login.php");
    error_log("Login fail ".$_POST['email']." $check");
    return;    
        } 
   }
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
    <div>
    <h1>Please Log In</h1>
    <?php
    if ( isset($_SESSION['error']) ) {
        echo('<p style="color: orange;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']); }
?>
    <form method="post">    
    User Name: <input type="text" name="email"><br/>
    Password: <input type="text" name="pass"><br/>
    <input type="submit" value="Log In" id="submit">
    <input type="submit" name="cancel" value="Cancel" id="cancel"><br/>
    </form>
    For a password hint, view source and find a password hint in the HTML comments.
    <!-- Hint: The password is the name of the server-side language being used
    (all lower case) followed by 123. -->
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

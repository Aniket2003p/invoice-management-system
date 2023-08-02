<?php
    if(empty($_POST["first_name"])){
        die("First Name is required");
    }
    if(empty($_POST["last_name"])){
        die("Last name is required");
    }
    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        die("Validate email is required");
    }
    if(strlen($_POST["password"])<6){
        die("Password must be greater than 6");
    }
    if(strlen($_POST["mobile"] <10)){
        die("mobile number is not valid");
    }
    if(! preg_match("/[a-z]/i",$_POST["password"])){
        die("Password must have letter ");
    }
    if(!preg_match("/[0-9]/",$_POST["password"])){
        die("password must have num value");
    }

    $mysqli = require __DIR__ ."/database.php";

    $sql = "INSERT INTO invoice_user (email,password,first_name,last_name,mobile,address) VALUES(?,?,?,?,?,?)";
    
    $stmt = $mysqli->stmt_init();  
    
    if(! $stmt->prepare($sql) ){
        die("Sql error ".$mysqli->error);
    }
    
    $stmt->bind_param("ssssss",$_POST["email"],$_POST["password"],$_POST["first_name"],$_POST["last_name"],$_POST["mobile"],$_POST["address"]);
   
    if($stmt->execute()){
        header("Location:index.php");
    }

?>


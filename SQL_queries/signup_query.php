<?php
if(isset($_POST['submitSignup'])){
    $nameSignup=$_POST['nameSignup'];
    $dateSignup=date('Y-m-d');
    $user_or_admin=$_POST['radioBox'];
    $emailSignup=$_POST['emailSignup'];
    $passwordSignup=$_POST['passwordSignup'];
    $confirmPasswordSignup=$_POST['confirmPasswordSignup'];

    //connection
    GLOBAL $connection;
    require_once "db_connection.php";

    $nameSignup=mysqli_real_escape_string($connection,$nameSignup);
    $emailSignup=mysqli_real_escape_string($connection,$emailSignup);
    $passwordSignup=mysqli_real_escape_string($connection,$passwordSignup);

    //query
    $query="INSERT INTO user_details(name,date,user_or_admin,email_id,password,confirmPassword) 
                VALUES('$nameSignup','$dateSignup','$user_or_admin','$emailSignup','$passwordSignup','$confirmPasswordSignup')";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("off ".mysqli_error($connection));
    }

       header("Location: signup.php");

   }

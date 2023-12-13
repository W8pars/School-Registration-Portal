<?php

if(isset($_POST["submit"])) {

    // instantiate signupcontroller class
    require "../db_config.php";
    require "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Invoke controller
    $login = new LoginContr($email, $password);

    // error handling
    $login->loginUser();

    // going back to front page
    header("location: ../profile.php");
    exit();
}
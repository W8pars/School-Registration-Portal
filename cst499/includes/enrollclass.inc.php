<?php

session_start();

if (isset($_POST['submit'])) {

    require "../db_config.php";
    require "../classes/dbh.classes.php";
    require "../classes/secretary.classes.php";
    require "../classes/secretary-contr.classes.php";
  
    // Check if 'course_id'/'class_id'/'user_id' is set in $_POST before using it
    // All are needed to remove student from a roster
    $course_id = isset($_POST['course_id']) ? $_POST['course_id'] : null;
    $class_id = isset($_POST['class_id']) ? $_POST['class_id'] : null;
    $user_id = $_SESSION['userid'];

    // Invoke controller and add user to roster
    $courseManagement = new SecretaryContr();
    $courseManagement->enrollUserInCourse($user_id, $class_id);

    // Go back to front page
    header("location: ../profile.php");
    exit();



}
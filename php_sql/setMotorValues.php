<?php
require_once '../conn.php';

if (isset($_POST['submit'])) {
    $motor1 = $_POST['Motor1'];
    $motor2 = $_POST['Motor2'];
    $motor3 = $_POST['Motor3'];
    $motor4 = $_POST['Motor4'];
    $motor5 = $_POST['Motor5'];
    $motor6 = $_POST['Motor6'];

    $sql = "UPDATE controller SET Value = $motor1 WHERE Name = 'Motor1'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    $sql = "UPDATE controller SET Value = $motor2 WHERE Name = 'Motor2'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    $sql = "UPDATE controller SET Value = $motor3 WHERE Name = 'Motor3'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    $sql = "UPDATE controller SET Value = $motor4 WHERE Name = 'Motor4'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    $sql = "UPDATE controller SET Value = $motor5 WHERE Name = 'Motor5'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    $sql = "UPDATE controller SET Value = $motor6 WHERE Name = 'Motor6'";
    $stmtinsert = $dbc->prepare($sql);
    if ($stmtinsert === false) { // if statement to check if failed to connect to db
        header("Location: index.php?error");
        exit();
    }
    $result = $stmtinsert->execute();
    header("Location: ../index.php");
    exit();
}
?>
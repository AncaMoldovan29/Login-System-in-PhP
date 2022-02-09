<?php

$conn = new mysqli('localhost','myuser', '123', 'webdev');

if($conn->connect_error){
    die('<h1>Eroare la conectarea la baza de date</h1>');
}

$userName = $_GET['userName'];
$userPass = $_GET['userPass'];

$interogare = "SELECT * FROM `users_test` WHERE `userName` = '$userName' ";
$rez = $conn->query($interogare)->fetch_assoc();
if( $rez){
    // $dataArray = $rez->fetch_assoc(); // ia prima inregistrare
    // echo '<pre>';
    // var_dump($rez);
    // echo '<pre>';
    
    if(password_verify($userPass,$rez['hashedPass'])){
    echo '<h2 style="color:green"> You are logged-in!</h2>';
    session_start();
    $_SESSION['userName'] = $userName;
    echo $_SESSION['userName'];
    header("Refresh: 3; url=indexAuth.php");
    }
    else{
        echo '<h2 style="color:red">Wrong pass!</h2>';
        header("Refresh: 3; url=index.html");
    }
}
else{
    echo '<h1 style="color: orange">User do not exist!</h1>';
}

// $dataArray = $rez->fetch_all(MYSQLI_ASSOC);

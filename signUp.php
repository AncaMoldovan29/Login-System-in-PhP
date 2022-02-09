<?php

$conn = new mysqli('localhost','myuser', '123', 'webdev');

if($conn->connect_error){
    die('<h1>Eroare la conectarea la baza de date</h1>');
}



 if(isset($_GET['signUpUserName'])){
     $uPass = $_GET['signUpPass1'];
     $userN = $_GET['signUpUserName'];
     $passH = password_hash($uPass, PASSWORD_DEFAULT);
     $interog = "INSERT INTO `users_test`(`userName`, `userEmail`, `userPass`, `hashedPass`) VALUES ('$userN','generic@email.ro','pass','$passH')";
     $rez = $conn->query($interog);
     if($rez == null){
         echo '<h2>Bad Query</h2>';
     }
     else{
         echo '<h2>User added</h2>';
         session_start();
         $_SESSION['userName'] = $userN;
         echo $_SESSION['userName'];
         header("Refresh: 3; url=indexAuth.php");
     }

 }
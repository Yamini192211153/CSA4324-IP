<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbanme = "petadoption1";
$conn = new mysqli($servername,$username,$password,$dbanme);
if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);
}
//Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];
    //prepare and execute the database insertion
    $sql = "INSERT INTO `petadoption1`(`username`, `password` )
     VALUES ('$username','$password')";
     if($conn->query($sql) == TRUE){
        echo "login successful Successfully";
     }else{
        echo "Error: " .$sql . "<br>" .$conn->error;
     }
}
$conn->close();
?>

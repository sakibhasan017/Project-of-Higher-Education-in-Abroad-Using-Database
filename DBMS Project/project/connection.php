<?php
 $host ="localhost";
 $user="root";
 $password="";
 $dp_name="Project22";

 $con=mysqli_connect($host,$user,$password,$dp_name);

 if(mysqli_connect_errno()){
    die("Failed to connect with SQL:".mysqli_connect_error());
 }
?>
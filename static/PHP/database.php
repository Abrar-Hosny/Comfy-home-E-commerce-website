<?php
$host="localhost";
$dbname="login_db";
$username="root";
$password="";
// we usw it when we d


$mysqli =new  mysqli (hostname:$host,username:$username,password:$password,database:$dbname);

if($mysqli ->connect_error){
    die("connection error " .$mysqli ->connect_error );;
}

return $mysqli;



?>
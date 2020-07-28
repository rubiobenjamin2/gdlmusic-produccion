<?php
$conn=new mysqli('localhost','root','root','gdlmusic');

if($conn->connect_error){
    echo $error -> $conn->connect_error;
}

?>
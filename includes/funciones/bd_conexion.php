<?php
//$conn=new mysqli('localhost','root','root','gdlmusic');	
$conn = new mysqli('bvduzklkzatbuboedtf9-mysql.services.clever-cloud.com', 'ulac8wmtyf8b7jf3', 'RhdvgxQ4ZJSp7XJKl7n1', 'bvduzklkzatbuboedtf9','3306');

if($conn->connect_error){	
    echo $error -> $conn->connect_error;	
}

<?php
$config = mysqli_connect("localhost","root","","e-commerce1");

if (mysqli_connect_errno()){
    echo "failed to connect to MySql :", mysqli_connect_error();
    exit();
}

?>
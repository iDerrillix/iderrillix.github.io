<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', '1netravels');
    if(!$con){
        echo 'Failed to connect';
    }
?>
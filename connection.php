<?php
$con=mysqli_connect("localhost","root","","mydb");
if($con->connect_errno){
    echo"error";
}
else{
    echo"connect built";
}
?>
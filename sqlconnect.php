<?php
 
    $conn = mysqli_connect("localhost","root","","form");

    if(mysqli_connect_error()){
      die("Not connected to MySQL Database. Error! :("."<br>");
    }

?>
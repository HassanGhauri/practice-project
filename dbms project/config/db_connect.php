<?php
$servername = "localhost";
$username = "hassan";
$password = "bscs";

try {
    $conn = new PDO("mysql:host=$servername;dbname = employee_record",$username,$password);
  } catch(PDOException $execption) {
    echo "Connection failed: " . $execption->getMessage();
  }
  ?>

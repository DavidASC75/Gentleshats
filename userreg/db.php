<?php
$conn = new PDO('mysql:host=localhost;dbname=userreg', 'root', '123', [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
     ]);
$conn->query('SET NAMES utf8')
?>
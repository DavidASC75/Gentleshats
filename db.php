<?php
$conn = new PDO('mysql:host=db.mp.spse-net.cz;dbname=koukolda18_1', 'koukolda18', 'porizanipyda', [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
     ]);
$conn->query('SET NAMES utf8')
?>
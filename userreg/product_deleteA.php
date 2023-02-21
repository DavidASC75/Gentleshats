<?php 
require_once 'db.php';

$sql = 'DELETE FROM orders WHERE id= :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);

header('Location: orderSuccA.php');
?>

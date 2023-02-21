<?php 
require_once 'db.php';

$sql = 'DELETE FROM tblproduct WHERE id= :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);

header('Location: product_edit.php');
?>

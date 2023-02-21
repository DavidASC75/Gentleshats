<?php 
require_once 'db.php';

$sql = 'DELETE FROM usertable WHERE id= :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);

header('Location: user_edit.php');
?>

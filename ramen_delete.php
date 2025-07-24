<?php
session_start();

$id = $_GET['id'] ?? '';
if (!$id) exit('IDが指定されていません');

include("functions.php");
$pdo = connect_to_db();
check_session_id();

$sql = 'DELETE FROM ramen_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: ramen_read.php');
exit();
?>

<?php
session_start();
include('functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE username = :username AND deleted_at IS NULL';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user['password'])) {
  exit('ログイン情報が間違っています');
}

$_SESSION['session_id'] = session_id();
$_SESSION['username'] = $user['username'];
$_SESSION['is_admin'] = $user['is_admin'];
$_SESSION['user_id'] = $user['id'];

header("Location: ramen_read.php");
exit();
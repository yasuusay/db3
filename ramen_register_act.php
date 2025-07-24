<?php
session_start();

include('functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (!$username || !$password) {
  exit('入力が不足しています');
}

$pdo = connect_to_db();

// ユーザー名の重複チェック
$sql = 'SELECT COUNT(*) FROM users_table WHERE username = :username';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
if ($stmt->fetchColumn() > 0) {
  exit('そのユーザー名はすでに使用されています');
}

// ハッシュ化して登録
$sql = 'INSERT INTO users_table (username, password, is_admin, created_at, updated_at)
        VALUES (:username, :password, 0, NOW(), NOW())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

try {
  $stmt->execute();
  header('Location: ramen_login.php');
  exit();
} catch (PDOException $e) {
  exit('登録失敗：' . $e->getMessage());
}

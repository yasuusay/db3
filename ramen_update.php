<?php
// 入力チェック
if (
  !isset($_POST['id']) ||
  !isset($_POST['shop_name']) || $_POST['shop_name'] === '' ||
  !isset($_POST['visit_date']) || $_POST['visit_date'] === '' ||
  !isset($_POST['rating']) || $_POST['rating'] === ''
) {
  exit('入力エラー：必須項目が入力されていません');
}

$id = (int)$_POST['id'];
$shop_name = $_POST['shop_name'];
$visit_date = $_POST['visit_date'];
$comment = $_POST['comment'] ?? '';
$rating = (int)$_POST['rating'];

// DB接続
include("functions.php");
$pdo = connect_to_db();

// UPDATE
$sql = 'UPDATE ramen_table SET shop_name = :shop_name, visit_date = :visit_date, comment = :comment, rating = :rating, updated_at = NOW() WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);
$stmt->bindValue(':visit_date', $visit_date, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':rating', $rating, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $stmt->execute();
  header('Location: ramen_read.php');
  exit();
} catch (PDOException $e) {
  exit('更新エラー：' . $e->getMessage());
}

<?php
session_start();

function connect_to_db()
{
  $db_name = "";
  $db_host = "";
  $db_id   = "";
  $db_pw   = "";

  try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4;port=3306";
    return new PDO($dsn, $db_id, $db_pw);
  } catch (PDOException $e) {
    exit('DB接続エラー：' . $e->getMessage());
  }
}

function check_session_id()
{
  if (!isset($_SESSION['session_id']) || $_SESSION['session_id'] != session_id()) {
    header("Location: ramen_login.php");
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION['session_id'] = session_id();
  }
}

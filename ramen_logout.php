<?php
session_start();
$_SESSION = array(); // セッション変数を全削除
session_destroy(); // セッション破棄
header('Location: ramen_login.php');
exit();

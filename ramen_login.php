<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
    <style>
    body {
      background-color: #fffaf5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      height: 70vh;
      margin: 0;
    }
    .login-container {
      background: #fffefc;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
      width: 320px;
      text-align: center;
    }
    h1 {
      color: #ff8c00;
      margin-bottom: 30px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ffb347;
      border-radius: 6px;
      font-size: 1em;
      box-sizing: border-box;
      transition: border-color 0.3s;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #ff8c00;
      outline: none;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #ff8c00;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #e57c00;
    }
    .register-link {
      margin-top: 15px;
      display: block;
      color: #ff8c00;
      text-decoration: none;
      font-weight: bold;
    }
    .register-link:hover {
      text-decoration: underline;
    }

    /* ユーザー登録ボタン */
    .register-button {
      margin-top: 25px;
      width: 100%;
      padding:12px 0;
      background-color: #ffa500;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.3s;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }
    .register-button:hover {
      background-color: #e59400;
      
    }
  </style>
</head>
<body>
  <h1>ログイン</h1>
  <form action="ramen_login_act.php" method="POST">
    ユーザー名: <input type="text" name="username"><br>
    パスワード: <input type="password" name="password"><br>
    <button type="submit">ログイン</button>
    <a href="ramen_register.php" class="register-button">新規ユーザー登録</a>
  </form>
  
</body>
</html>
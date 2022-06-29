<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCUTYPE HTML>
<HTML="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログインエラー</title>
        <link rel ="stylesheet" type="text/css" href="login.css">
    </head>

<body>
    <header>
       <img src="4eachblog_logo.jpg">
       <div class="login"><a href="login.php">ログイン</a></div> 
    </header>

    <main>
        <div class ="contents"> 
             <form action="mypage.php" method="post">
                <p>メールアドレスまたはパスワードが間違ってます。</p>
                <div class="mail">
                    <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div> 
                <div class="password">
                    <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" name="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div> 
                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
            </form>
        </div>
    </main>

    <footer>
        ©2018 InterNous.Inc ALL right reserved
    </footer>
</body>
</html>
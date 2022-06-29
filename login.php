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
        <title>ログイン</title>
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
            
                <div class="mail">
                    <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php 
                                                                                                                                                    if(isset($_COOKIE['mail'])){
                                                                                                                                                        echo $_COOKIE['mail'];
                                                                                                                                                     }
                                                                                                                                                    ?>">
                </div> 
                <div class="password">
                    <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" name="password" pattern="^[a-zA-Z0-9]{6,}$" required required value="<?php 
                                                                                                                                             if(isset($_COOKIE['password'])){
                                                                                                                                                echo $_COOKIE['password'];
                                                                                                                                             }
                                                                                                                                             ?>">
                </div> 
                <div class="login_check">
                    <label> <input type="checkbox" class="formbox" size="40" name="login_keep"
                    <?php
                    if(isset($_COOKIE['login_keep'])){
                        echo"checked='checked'";
                    }
                    ?>>
                    ログイン状態を保持する</label><br>
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
<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id']) || empty($_POST['from_mypage'])){
    session_destroy();
    header('Location:http://localhost/login_mypage/login_error.php');
}

?>

<!DOCUTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ編集</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
    <body>
    <header>
       <img src="4eachblog_logo.jpg">
       <div class="logout"><a href="log_out.php">ログアウト</a></div> 
    </header>
        <div class ="contents">
            <h2>会員情報</h2>
            <p>こんにちは！ <?php echo $_SESSION['name'] ?> さん。</p>
                                       
                <div class="confirm_contents">
                    <?php echo '<img src="'.$_SESSION['picture'].'" width="160"height="160" class="profile">'?>   
                </div>
                
                <form action="mypage_update.php" method="post">
                    <input type="hidden" name="picture" value="<?php echo $_SESSION['picture']?>">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">

                    <div class="confirm_contents">
                        <label>氏名:<form> 
                        <input type="text" class="formbox" size="32" name="name" value="<?php echo $_SESSION['name']; ?>" required></label>
                        <br>
                    </div>
                    
                    <div class="confirm_contents">
                        <label>メール:
                        <input type="text" class="formbox" size="30" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php echo $_SESSION['mail']; ?>"></label>
                        <br>
                    </div>

                    <div class="confirm_contents">
                        <label>パスワード:
                        <input type="password" class="formbox" size="25" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required value="<?php echo $_SESSION['password']; ?>">  </label>
                        <br>
                    </div>
                    
                    <div class=comments>
                        <div class="confirm_contents">
                            <label>
                            <textarea rows="5" cols="77" name="comments"><?php echo $_SESSION['comments']; ?></textarea></label>
                            <br>
                        </div>
                    </div>
                        <input type="submit" class="button1" value="編集完了"/>
                </form>
                
        </div>
    </body>
</div> 
    <footer>
        ©2018 InterNous.Inc ALL right reserved
    </footer>
</html>

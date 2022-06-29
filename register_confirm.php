<?php
    mb_internal_encoding("utf8");
    $temp_pic_name=$_FILES['picture']['tmp_name'];
    $original_pic_name=$_FILES['picture']['name'];
    $path_filename='./image/'.$original_pic_name;
    move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
;
?>

<!DOCUTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>
    <body>
    <header>
       <img src="4eachblog_logo.jpg">
       <div class="login"><a href="login.php">ログイン</a></div> 
    </header>
        <div class ="contents">
            <h2>会員登録 確認</h2>
            <p>こちらの内容で登録しても宜しいでしょうか？</p>
                <div class="confirm_contents">
                    <label>氏名:<?php echo $_POST['name']; ?></label>
                <br>
                </div>
                
                <div class="confirm_contents">
                    <label>メール:<?php echo $_POST['mail']; ?></label>
                <br>
                </div>
                <div class="confirm_contents">
                     <label>パスワード:<?php echo $_POST['password']; ?></label>
                <br>
                </div>
                <div class="confirm_contents">
                     <label>プロフィール写真:<?php echo $original_pic_name ?></label>
                <br>
                </div>
                <div class="confirm_contents">
                      <label>コメント:<?php echo $_POST['comments']; ?></label>
                <br>
                </div>
    
                <form action="register.php">
                     <input type="submit" class="button1" value="戻って修正する"/>
                </form>
        
                <form action="register_insert.php" method="post">
                     <input type="submit" class="button2" value="登録する"/>
                     <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                     <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                     <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                     <input type="hidden" value="<?php echo $path_filename; ?>" name="picture">
                     <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                 </form>
        </div>
    </body>
</div> 
    <footer>
        ©2018 InterNous.Inc ALL right reserved
    </footer>
</html>
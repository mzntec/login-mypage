<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

    try{
        $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    }catch(PDOException $e){
        die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
    }

    $stmt=$pdo->prepare("select * from login_mypage where mail= ? and password = ?");

    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);

    $stmt->execute();
    $pdo=NULL;

    while($row=$stmt->fetch()){
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
        $_SESSION['id']=$row['id'];
    }

    if(empty($_SESSION['id'])){
        session_destroy();
        header('Location:http://localhost/login_mypage/login_error.php');
    }

    if(!empty($_POST['login_keep'])){
        $_SESSION['login_keep']=$_POST['login_keep'];
    }

}

if(!empty($_SESSION['id'])&& !empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
}
else if(empty($_SESSION['login_keep'])){
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);
}


?>

<!DOCUTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
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

                <div class="confirm_contents">
                    <label>氏名:<?php echo $_SESSION['name']; ?></label>
                    <br>
                </div>
                
                <div class="confirm_contents">
                    <label>メール:<?php echo $_SESSION['mail']; ?></label>
                    <br>
                </div>

                <div class="confirm_contents">
                    <label>パスワード:<?php echo $_SESSION['password']; ?></label>
                    <br>
                </div>
                
                <div class=comments>
                    <div class="confirm_contents">
                        <label>コメント:<?php echo $_SESSION['comments']; ?></label>
                        <br>
                    </div>
                </div>
            
                <form action="mypage_hensyu.php" method="post">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                    <input type="submit" class="button1" value="編集する"/>
                </form>
                
        </div>
    </body>
</div> 
    <footer>
        ©2018 InterNous.Inc ALL right reserved
    </footer>
</html>
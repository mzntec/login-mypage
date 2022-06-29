<?php
mb_internal_encoding("utf8");

session_start();

try{
$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}
$stmt= $pdo->prepare("update login_mypage set name=?, mail=?, password=?, picture=?, comments=? where id=?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);
$stmt->bindValue(6,$_POST['id']);

$stmt->execute();

$stmt1= $pdo->prepare("select * from login_mypage where id=?");

$stmt1->bindValue(1,$_POST['id']);

$stmt1->execute();
$pdo=NULL;

while($row=$stmt1->fetch()){
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

header("Location:mypage.php");

?>
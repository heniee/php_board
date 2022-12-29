<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index</title>

    </head>
    <body>

<?php
/*
DB 접속정보
host : localhost
id : hyehyeon_db
pw : 1234
db : hyehyeon_db
*/
session_start();

//db연결
$servername = 'localhost';
$user = 'hyehyeon_db';
$password = '1234';
$dbname = 'hyehyeon_db';
$connect = mysqli_connect($servername, $user, $password, $dbname);

//연결 확인
    if($connect){
        echo "접속 성공";
    }else{
        echo "접속 실패";
    }
?><br/>

<?php

session_start();
 
    if(!isset($_SESSION['userid'])) {
        echo "<p>로그인이 필요합니다</p>";
        echo "<p><button onclick=\"window.location.href='/board/login.php'\">로그인</button> </p>";
    } else {
        $userid = $_SESSION['userid'];
        echo "<p>WELCOME $userid";
        echo "<p><button onclick=\"window.location.href='/board/logout.php'\">로그아웃</button></p>";
    } 
    
?>

    </body>
</html>
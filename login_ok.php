<?php
include 'index.php';

session_start();

$userid = $_POST[userid];
$userpw = $_POST[userpw];

// 아이디 확인
$query = "select * from `member` WHERE userid = '$userid'"; 
$result = mysqli_query($connect,$query); 
$row = mysqli_fetch_array($result);

$userpw_hash = $row['userpw'];

//사용자 비밀번호 입력값과 저장된 hash값 비교
if(password_verify($userpw, $userpw_hash)){

    // 세션 생성
    $_SESSION['userid'] = $row['userid'] ;

    echo "<script>alert('로그인에 성공했습니다');";
    echo "window.location.replace('list.php');</script>";
}else{
    echo "<script>alert('아이디 혹은 비밀번호가 잘못됐습니다');";
    echo "window.location.replace('login.php');</script>";
}

?>

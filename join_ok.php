<?php

include 'index.php';

$userid = $_POST[userid]; 
$userpw = $_POST[userpw];
$username = $_POST[username];
$date = date('Y-m-d');  


//비밀번호 암호화(비밀번호 값이 매번 달라짐)
$userpw_hash = password_hash($userpw, PASSWORD_DEFAULT);

//echo $userid;
//echo $userpw_hash;

$URL = '/board/login.php';

$query = "insert into member(userid,userpw,username,date)
            values('$userid','$userpw_hash','$username','$date')";            
$result = mysqli_query($connect,$query);

?>


<script>
    alert("<?php echo "회원가입이 완료되었습니다."?>");
    location.replace("<?php echo $URL?>");
</script>

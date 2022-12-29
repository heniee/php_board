<?php

include 'index.php';
session_start();

$URLlogin ='/board/login.php';

if(!isset($_SESSION['userid'])){
    ?>
    
    <!--세션 확인 후 없으면 로그인창 띄우기-->
    <script>
        alert("로그인이 필요합니다");
         location.replace("<?php echo $URLlogin?>");
    </script>
    <?php }else{



$userid = $_SESSION['userid'];
$bno = $_POST[bno];  
$content = $_POST['content'];  
$date = date('Y-m-d H:i:s'); 

$URL = '/board/read.php?bno=';
print($URL);

$query = "insert into comment(userid,content,date,bno)
            values('$userid','$content','$date','$bno')";

$result = mysqli_query($connect, $query);


?>

<?php } ?>

<script>
    alert("<?php echo "댓글이 등록되었습니다."?>");
    location.replace("<?php echo $URL.$bno?>");
</script>
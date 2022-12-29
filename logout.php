<?php

session_start();

//세션 삭제
unset($_SESSION['userid']);

$URL = '/board/index.php';

?>

echo("<script> alert('로그아웃 되었습니다');
location.replace("<?php echo $URL?>");  </script>"

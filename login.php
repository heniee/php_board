<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
include 'index.php';
    ?>


    <?php
     if(!isset($_SESSION['userid'])) { ?>

    <p>로그인</p>
    <form method="post" action="/board/login_ok.php" name="loginForm">
        <table>
            <tr></tr>
                <td>아이디</td>
                <td><input type="text" name=userid placeholder="아이디를 입력하세요" required></td>
            <tr>
                <td>비밀번호</td>
                <td><input type="password" name=userpw placeholder="비밀번호를 입력하세요" required></td>
            </tr>
        </table>

        <div class="btnset">
            <button id="submit" type="submit" value="로그인">로그인</button>
        </div>
    </form>
    
    <button onclick="location.href='join.php'">회원가입</button>
    
    <?php } else {
        $userid = $_SESSION['userid'];
        echo "<p>WELCOME $userid($userid)"; }
        ?>

    <script>

    </script>
</body>
</html>
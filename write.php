<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>write</title>
    <style>
        .table{
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin : 20px 10px;
            }
        .table tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }
        .table td {
            width: 100px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        textarea{
            width: 500px;
            height: 300px;
            resize: none;
        }

    </style>
    
</head>
<body>
    <?php
include 'index.php';
    $URL = '/board/login.php';
    session_start();
    if(!isset($_SESSION['userid'])){

    ?>
    
    <!--세션 확인 후 없으면 로그인창 띄우기-->
    <script>
        alert("로그인이 필요합니다");
         location.replace("<?php echo $URL?>");
    </script>
    <?php
    }
    ?>

<!--작성된 내용 저장하는 php로 보내기-->
    <form method = "post" action="/board/write_ok.php" >
        
         <!-- 답글 작성 위해서 데이터 넘기기 -->
        <input type="hidden" name="ref"  size=20 value="<?php echo $_GET['ref']?>">  
        <input type="hidden" name="step"  size=20 value="<?php echo $_GET['step']?>">  
        <input type="hidden" name="depth"  size=20 value="<?php echo $_GET['depth']?>">   

        <table class="table">
            <tr>
                <td>작성자</td>
                <td><input type="hidden" name=userid size=20> <?php echo $_SESSION['userid']?> </td>
            </tr>
            <tr>
                <td>제목</td>
                <td><input type=text name=title size=50 required> </td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name=content></textarea required></td>
            </tr>
        </table>

        <div class=btnset>
            <button type="submit" value="글작성">글작성</button>
            &nbsp;&nbsp;
            <a href="/board/list.php">목록으로</a>
        </div>
    </form>



</body>
</html>
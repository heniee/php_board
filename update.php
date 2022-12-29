<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

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
     session_start();
     if(!isset($_SESSION['userid']));
    ?>

<?php
    $bno = $_GET['bno'];
    $query = "select * from board where bno = '$bno'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);


?>

<form method = "post" action = "/board/update_ok.php" >
    <table class="table">
        <input type="hidden" value="<?php echo $row['bno'] ?>" name=bno>
        <tr>
            <td>작성자</td>
                <td><input type="hidden" name=userid size=20> <?php echo $_SESSION['userid']?> </td>
            </tr>
            <tr>
                <td>제목</td>
                <td><input type=text name=title size=50 value="<?php echo $row['title']?>" required > </td>
        
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name=content ><?php echo $row['content'] ?></textarea required></td>
            </tr>
        </table>

        <div class=btnset>
            <button type="submit" value="수정">수정</button>
            &nbsp;&nbsp;
            <a href="/board/list.php">목록으로</a>
        </div>
    </form>

</body>
</html>
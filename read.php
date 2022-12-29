<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read</title>

    <style>
        .table, .comment{
            line-height: 1.5;
            border: 1px solid #ccc;
            margin : 20px 10px;
            width:1000px;
            }
        .view{
            text-align: center;
            border: 1px solid #EEEEEE;
            width: 10%;
            }
        .content{
            text-align:center;
            height:500px;
        }
        textarea{
            width: 700px;
            height: 100px;
            resize: none;
        }
        .refview{
            display:none;        }

    </style>
</head>

<body>
    <?php
    include 'index.php';
     session_start();
     if(!isset($_SESSION['userid']));
    ?>

    <?php
       //list 에서 넘어온 글 저장
       $bno = $_GET["bno"];
       $query = "select * from board where bno='$bno'"; 
       //조회수 업데이트
       $query_view = "update board set view = view + 1 where bno = '$bno'";

       //쿼리 실행 
       $result = mysqli_query($connect,$query); 
       $result2 = mysqli_query($connect,$query_view); 
       $row = mysqli_fetch_array($result);
       
    ?>

    <table class="table">
        <thead>
            <tr class="table_tr">      
                 <th colspan="4" class="title"><?php echo $row['title']?></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="view">글쓴이</td>
                <td class="view"><?php echo $row['userid']?></td>
                <td class="view">작성일</td>
                <td class="view"><?php echo $row['date'] ?></td>
                <td class="view">조회수</td>
                <td class="view"><?php echo $row['view']?></td>
            </tr>
            <tr>
                <td class="content"><?php echo $row['content']?></td>
            </tr>
        </tbody>
    </table>

    <?php
    // 글 작성자만 버튼 활성화
    if($_SESSION['userid'] == $row['userid']){ ?> 
    <button onclick="location.href='/board/update.php?bno=<?=$row['bno'] ?>'">수정</button>

    <!-- ############## 계층형게시판 수정부분 ################### 
        bno,ref,step,depth 전달 -->
    <button onclick="location.href='/board/write_re.php?bno=<?=$bno?>&ref=<?=$row['ref']?>&step=<?=$row['step']?>&depth=<?=$row['depth']?>'">답글쓰기</button>

    <!-- 수정버튼과 동일하게 delete.ok로 넘기면 비밀번호를 get방식으로 받게되는데 url에 나타나기 때문에 
        보안에 취약, 방지하기 위해 post방식으로 보낸다 ->form 사용  -->
    <form method="post" action="/board/delete_ok.php">
         <input type="hidden" value="<?php echo $row['bno'] ?>" name=bno>
         <button type="submit" value="삭제">삭제</button>
    </form>
    
    <?php } ?>

    

    <button onclick="location.href='/board/list.php'">목록으로</button>

    
    <!-- 댓글 목록-->
<br/><br/>
    <?php
        $query_comment = "select * from comment where bno = '$bno'";
        $result_comment = mysqli_query($connect, $query_comment);

        $ctotal = $result_comment->num_rows;
    
        if($ctotal == 0){
    ?> <tr>등록된 댓글이 없습니다</tr>
    <?php        
        } else {
?>

    <?php while($row2 = mysqli_fetch_array($result_comment)){
        ?>
        
        <table class = "comment">

        <colgroup border="1">
            <col width="20%"/>
            <col width="60%"/>
            <col width="10%"/>
            <col width="5%"/>
            <col width="5%"/>
         </colgroup>
         

        <tr>
            <td> <?php echo $row2['userid'] ?></td>
            <td> <?php echo $row2['content'] ?></td>
            <td> <?php echo $row2['date'] ?></td>
        
            <?php

             // 글 작성자만 버튼 활성화
             if($_SESSION['userid'] == $row2['userid']){ ?> 
             
              <td> <button onclick="commentModify()">수정</button> </td>
              <td>
                <form method="post" action="/board/c_delete_ok.php">
                     <input type="hidden" value="<?php echo $row['bno'] ?>" name=bno>
                     <input type="hidden" value="<?php echo $row2['cno'] ?>" name=cno>
                     <button type="submit" value="삭제">삭제</button>
                </form>
              </td>
             <?php } ?>
        </tr>

    </table>
    <?php }}

    ?>

  
    <!-- 댓글 작성 -->
        <form method="post" action="/board/c_write_ok.php">
            <table class="table">
                <tr>
                    <td>작성자</td>
                    <td><input type="hidden" name=userid size=20 required> <?php echo $_SESSION['userid']?> </td>       
                    <!--bno 넘길때 value값으로 안주고 그냥 input안에 입력해서 안넘어갔음 ㅠ --> 
                    <td>
                        <input type="hidden" value="<?php echo $row['bno'] ?>" name=bno></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td><textarea name=content required></textarea ></td> 
                    <td><button type = "submit" value="등록">등록</button>
                </tr>
            </table>
        </form>

    <!-- 댓글 수정 -->
    <script>
        
        function commentModify(){
            
        }
    </script>

</body>
</html>








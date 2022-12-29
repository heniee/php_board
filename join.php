<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>join</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/join.css">
    <link href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" rel="stylesheet" type="text/css">

</head>
<body>
    <?php
include 'index.php';
    ?>
  
  <div class = "main">   
      <h1>JOIN</h1>
      <form method = "post" action ="/stairBoard/join_ok.php">
          <div class="joinForm">    
              <table class="joinIntput">
                  <tr>
                      <!-- 중복검사 추가 !! -->
                      <td>ID</td>
                      <td><input type="text" name='userid' id='userid' placeholder="아이디" required></input></td>
                      <td><input type="hidden" name='decideId' id='decideId' ></input></td>
                      <td ><input type='button' id='idcheck' value='ID 중복검사' onclick = "checkid();"></input></td>
            </tr>

           <tr>
              <td>PW</td>
              <td><input type="password" name='userpw' id='userpw' placeholder="비밀번호" required></td>
           </tr>
           <tr>
            <td>PW확인</td>
            <td><input type="password" name='pwcheck' id='pwcheck' placeholder="비밀번호를 다시 입력해주세요" ></td>
            </tr>
           <tr>
              <td>NAME</td>
              <td><input type="text" name='username' id='username' placeholder="이름" required></td>
           </tr>
        </table>

        <div class="btnset">
            <button type="submit" id='join_btn'value="회원가입"  disabled=true>회원가입</button>
        </div>
    </div>
    </form>
</div>    
</body>

<script>
 
 // 아이디 체크 
function checkid(){
    var userid = document.getElementById('userid').value;

    if(userid){
        url = "idcheck.php?userid="+ userid;
		window.open(url,"chkid","width=400,height=200");
    }else{
        alert('아이디를 입력해주세요');
    }
}


 // 아이디 체크 후 사용할때 수정내용 
 function decide(){
    // 확정한 id를 hideen태그의 value로 넣어주기 
    document.getElementById("decideId").value = document.getElementById("userid").value;
    //회원가입버튼 활성화
    document.getElementById("join_btn").disabled = false;
    //로그인폼 비활성화
    document.getElementById("userid").disabled = true;
    //중복검사 버튼 바꾸기
    document.getElementById("idcheck").value = "다른 ID로 변경";
    //다른ID로 변경 버튼의 onclick 함수를 change()로 변경 
    document.getElementById("idcheck").setAttribute("onclick", "change()");
 }


 // 체크아이디 수정할때 -> 초기상태로 
 function change(){
    //회원가입버튼 비활성화
     document.getElementById("join_btn").disabled = true;
    //로그인폼 활성화
    document.getElementById("userid").disabled = false;
    //로그인폼 비워주기 
    document.getElementById("userid").value = ""
    //다른 ID로 변경 버튼 초기상태로 바꾸기
    document.getElementById("idcheck").value = "ID 중복검사";
     //다른 ID로 변경 버튼의 onclick 함수를 checkid()로 변경 
     document.getElementById("idcheck").setAttribute("onclick", "checkid()");
 }
    </script>
</html>
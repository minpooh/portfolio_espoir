<!DOCTYPE html>
<html lang="ko">
 <head>
	<title>espoir</title>
	<meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		*{margin:0; padding:0;}
		body{margin:0; padding:0; background-color:#fcfcfc;}

		form{width:300px; margin:100px auto 0; box-shadow:3px 3px 20px rgba(0,0,0,0.1);
		border:1px solid #ccc; border-radius:5px; padding:10px 20px; font-size:12px;}

		legend{text-align:center; font-family:'Oswald', sans-serif; font-size:40px; font-weight:500; padding:10px 0;}

		form p{padding:5px 0;}

		label{display:block; width:80px; background-color:#eee; text-align:center;
		line-height:27px; border:1px solid #ccc; float:left;}

		input{width:210px; border:1px solid #ccc; border-left:none; 
		text-indent:10px; height:27px; line-height:27px;}

		#button{width:150px; margin:0 auto; }
		#button input{display:inline-block; width:60px; height:26px; background-color:#fff;
		text-indent:0; border-left:1px solid #ccc;}

		#button input:hover{background-color:#f00; color:#fff; cursor:pointer;}

		/*아이디 중복 체크 (span) */
		#idChkDesc{width:230px; height:20px; float:left; text-align:center; padding:10px 5px; text-align:right;}

		/*아이디 중복 체크 옆에 버튼*/
		#idChkBtn{width:50px; text-align:center; text-indent:0; border-left:1px solid #ccc; margin:5px 0; font-size:12px;}

		#postArea{width:100%;}
		#postArea input{width:97px; border:1px solid #ccc;}
		#postArea #post3{width:190px; text-indent:5px; display:inline-block;}
		#postArea #postBtn{text-indent:0; width:90px; margin-left:5px;}

		#add1, #add2{width:148px; border:1px solid #ccc;}
		#add2{width:298px;}
	</style>

	<!--[1] 아이디 중복관련 script-->
	<script>
		function idChkBtns(){
			
			var userid = document.getElementById("userid");
			
			// span 태그
			var idChkDesc = document.getElementById("idChkDesc");
			// console.log(idChkDesc);

			if(userid.value =="" ){
				alert("아이디가 비어있습니다.");
				userid.focus();
				idChkDesc.innerHTML="<strong style='color:red;'>아이디 필수입력</strong>";
			}
			else{
				
				xmlhttp = new XMLHttpRequest();

				xmlhttp.open("GET","idDouble.php?q="+userid.value,true);

				xmlhttp.onreadystatechange = function(){
					
					if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
						
						idChkDesc.innerHTML = xmlhttp.responseText;
					}
				
				};
				
				xmlhttp.send();
			}
		}
	</script>

	<!--[2] 우편번호 관련 script-->
	<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
	<script>
		function postcode(){
			new daum.Postcode({
        		oncomplete: function(data) {
					document.getElementById("post3").value=data.zonecode;
					document.getElementById("add1").value=data.address;
					document.getElementById("add2").focus();
        		}
    		}).open();
		}
	</script>
 </head>
 <body>
	<form action="join_control.php" method="post">
		<legend>JOIN</legend>
		<p>
			<label for="userid">아이디</label>
			<input id="userid" type="text" name="userid" placeholder="10자 까지 입력가능" maxlength="10" required/>
			<span id="idChkDesc">※ 아이디 중복체크</span>
			<input id="idChkBtn" type="button" value="중복체크" onclick="idChkBtns();"/>
		
		</p>
		<p>
			<label for="userpass">비밀번호</label>
			<input id="userpass" type="password" name="userpass" placeholder="8자 까지 입력가능" maxlength="8" required/>
		</p>
		<p>
			<label for="username">이름</label>
			<input id="username" type="text" name="username" required/>
		</p>
		<p>
			<label for="useremail">이메일</label>
			<input id="useremail" type="email" name="useremail" required/>
		</p>
		<p>
			<label for="userphone">전화번호</label>
			<input id="userphone" type="tel" name="userphone" placeholder="010-123-4567" title="전화 번호 기입시 - 작성" required
			pattern="\d{3}-\d{3,4}-\d{4}"/>
		</p>
		<p id="postArea">
			<input id="post3" type="text" name="post3" title="새로운 우편번호" placeholder="새로운 우편번호"/>
			<input id="postBtn" type="button" value="우편번호 찾기" onclick="postcode();"/>
		</p>
		<p>
			<label for="add1">상세주소</label>
			<input id="add1" type="text" name="add1" title="상세주소1"/> - <input id="add2" type="text" name="add2" title="상세주소2"/>
		</p>
		<p id="button">
			<input type="submit" value="가입하기" title="가입하기"/>
			<input type="reset" value="다시작성" title="다시작성"/>
		</p>
	</form>
 </body>
</html>
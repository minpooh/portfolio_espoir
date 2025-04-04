<?php

	include "00_conn.php";

	$userid = $_POST['userid'];
	$userpass = $_POST['userpass'];
	$username = $_POST['username'];
	$useremail = $_POST['useremail'];
	$userphone = $_POST['userphone'];


	# post3 (우편번호)
	$post3 = $_POST['post3'];

	# add1	(기본주소)
	$add1 = $_POST['add1'];

	# add2 (상세주소)
	$add2 = $_POST['add2'];


	$address = $post3." ".$add1." ".$add2;

	if( !empty($userid) && !empty($userpass) && !empty($username) && !empty($useremail) && !empty($userphone) && !empty($address)){
		
		$sql = "INSERT INTO members (userid, userpass, username, useremail, userphone, address) 
		VALUES
		('$userid', '$userpass', '$username', '$useremail', '$userphone', '$address')";
		
		$result = mysqli_query($conn, $sql);
	}


	if($result){
		echo "<p style='text-align:center; color:blue;'>회원가입에 성공했습니다.</p>";
	}
	else{
		echo "<p style='text-align:center; color:red;'>회원가입에 실패했습니다.</p>";
	}

?>
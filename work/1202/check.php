<?php
$empty_ck = "";
$str_ck = "";
$check = false;

if(isset($sort) && isset($hour) && isset($minute) && isset($schpage)){ //from showinfo.php
	if($hour>24 || $hour<0 || !preg_match("/^[0-9]{1,2}$/",$hour)){
		if($hour != ""){
			$str_ck .= "請填入0~24的整數(時)\\n";
		}
	}
	if($minute>59 || $minute<0 || !preg_match("/^[0-9]{1,2}$/",$minute)){
		if($minute != ""){
			$str_ck .= "請填入0~59的整數\\n";
		}
	}
if(!preg_match("/^[1-9]+$/",$schpage)){
	if($schpage != ""){
		$str_ck .= "頁碼請輸入大於1的整數\\n";
	}else{
		$schpage = null;
	}
}

	if(preg_match("/^[0-9]{1}$/",$hour)){
		$hour = "0$hour";
	}
	if(preg_match("/^[0-9]{1}$/",$minute)){
		$minute = "0$minute";
	}
	
	if(!empty($str_ck)){
		echo "<script>\n";
		echo "alert('$str_ck');\n";
		echo "</script>\n";
	}
}

if(isset($id) && isset($o_pwd) && isset($n_pwd) && isset($n_pwd_ck)){
//from setpassword.php
	if(empty($o_pwd)){
		$empty_ck .= "舊密碼未填寫\\n";
	}
	if(empty($n_pwd)){
		$empty_ck .= "新密碼未填寫\\n";
	}
	if(empty($n_pwd_ck)){
		$empty_ck .= "確認密碼未填寫\\n";
	}

	if(!empty($empty_ck)){
		echo "<script>\n";
		echo "alert('$empty_ck');\n";
		echo "history.go(-1);\n";
		echo "</script>\n";
	}else{
		$sql_ck = "SELECT * FROM user WHERE password = '$o_pwd'";
		$mysql->query($sql_ck);
		$row_ck = $mysql->get_num_rows();
	
		if($row_ck == 0){
			$str_ck .= "舊密碼錯誤\\n";
		}
		if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$n_pwd)){
			$str_ck .= "密碼為至少5個數字與字母組合\\n";
		}
		if($n_pwd != $n_pwd_ck){
			$str_ck .= "確認密碼與新密碼不相同\\n";
		}

		if(!empty($str_ck)){
			echo "<script>\n";
			echo "alert('$str_ck');\n";
			echo "history.go(-1);\n";
			echo "</script>\n";
		}else{
			$check = true;
		}
	}
}

if(isset($id) && isset($refresh) && is_null($pwd_ck)){ //from edit.php
	if(!preg_match("/^[1|3|5]{1}$/",$refresh)){
		$str_ck .= "顯示頻率格式錯誤\\n";
		echo "<script>\n";
		echo "alert('$str_ck');\n";
		echo "history.go(-1);\n";
		echo "</script>\n";
	}else{
		$check = true;
	}
}

if(isset($user) && isset($pwd) && isset($pwd_ck) && isset($refresh)){
	//from add.html

	if(empty($user)){
		$empty_ck .= "帳號未填寫\\n";
	}
	if(empty($pwd)){
		$empty_ck .= "密碼未填寫\\n";
	}
	if(empty($pwd_ck)){
		$empty_ck .= "確認密碼未填寫\\n";
	}
	if(empty($refresh)){
		$empty_ck .= "顯示頻率未填寫\\n";
	}

	if(!empty($empty_ck)){
		echo "<script>\n";
		echo "alert('$empty_ck');\n";
		echo "history.go(-1);\n";
		echo "</script>\n";
	}else{
		$sql_ck = "SELECT user FROM user WHERE user='$user'";
		$mysql->query($sql_ck);
		$row = $mysql->get_num_rows();
		if($row > 0){
			$str_ck .= "此帳號已申請過\\n";
		}

		if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$user)){
			$str_ck .= "帳號為至少5個數字與字母組合\\n";
		}
		if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$pwd)){
			$str_ck .= "密碼為至少5個數字與字母組合\\n";
		}
		if(!preg_match("/^[1|3|5]{1}$/",$refresh)){
			$str_ck .= "顯示頻率格式錯誤\\n";
		}
		
		if(!empty($str_ck)){
			echo "<script>\n";
			echo "alert('$str_ck');\n";
			echo "history.go(-1);\n";
			echo "</script>\n";
		}else{
			$check =true;
		}
	}

}
?>
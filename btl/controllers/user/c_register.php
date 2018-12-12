<?php 
	session_start();
	if(isset($_POST["ok"]))
	{
		$f = $_POST["fname"];
		$l = $_POST["lname"];
		$u = $_POST["user"];
		$e = $_POST["email"];
		$p = $_POST["pass"];
	}

	if(isset($f) && isset($l) && isset($u) && isset($e) && isset($p))
	{	
	  	if($p != $_POST["re_pass"])
		{
			$err = "* Bạn nhập lại mật khẩu không đúng";
		}
  		else
  		{
  			require("../../models/user/m_user.php");
			$user = new user();
			$user->set_name($f);
			$user->set_name($l);
			$user->set_name($e);
			$user->set_name($u);
			$user->set_pass($p);
			if($user->register() == 'fail')
			{
				$no = "* Tài khoản đã tồn tại";
			}
			else
			{
				$ok = "* Đăng kí thành công, <a href='login.php'>Đăng nhập</a> để vào website<br />";
			}								
	  	}	  												    
	}
	require("../../views/user/register.php");				 		
?>

<?php 
	session_start(); 
	if(isset($_POST['ok']))
	{
		$u = $_POST['user'];
		$p = $_POST['pass'];
		if(isset($u) && isset($p))
		{
			require("../../models/user/m_user.php");
			$user = new user();
			$user->set_name($u);
			$user->set_pass($p);
			if($user->login() == 'ok')
			{
				if($_SESSION['level'] == 1)
				{
					ob_start(); 
					header('Location: admin/admin.php');
					ob_end_flush();
				}
				else
				{
					ob_start(); 
					header('Location: ../../index.php');
					ob_end_flush();
				}
			}
			else
			{
				$err = "<p style='color: red;'>* Bạn nhập sai tài khoản hoặc mật khẩu</p>";
			}
			$user->disconnect();
		}
	}
	include('../../views/user/login.php');
?>
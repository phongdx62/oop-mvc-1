<?php  
	include('../../public/library/database.php');
	class user extends database
	{
		protected $userID;
		protected $firstName;
		protected $lastName;
		protected $userEmail;
		protected $userName;
		protected $userPass;	
		protected $userLevel;

		public function __construct()
		{
			$this->connect();
		}

		public function set_fname($fname)
		{
			$this->firstName = $fname;
		}

		public function get_fname()
		{
			return $this->firstName;
		}

		public function set_lname($lname)
		{
			$this->lastName = $lname;
		}

		public function get_lname()
		{
			return $this->lastName;
		}

		public function set_email($email)
		{
			$this->userEmail = $email;
		}

		public function get_email()
		{
			return $this->userEmail;
		}

		public function set_name($name)
		{
			$this->userName = $name;
		}

		public function get_name()
		{
			return $this->userName;
		}

		public function set_pass($pass)
		{
			$this->userPass = $pass;
		}

		public function get_pass()
		{
			return $this->userPass;
		}

		public function set_level($level)
		{
			$this->userLevel = $level;
		}

		public function get_level()
		{
			return $this->userLevel;
		}

		public function login()
		{
			$sql = "SELECT username, password, level FROM users WHERE username = '$this->userName' AND password = '$this->userPass' ";
			$this->query($sql);
			if($this->num_rows()==1)
			{
				$data = $this->fetch_assoc();
				$_SESSION['name'] = $this->userName;
				$_SESSION['level'] = $data['level'];
				return 'ok';
			}
			else
			{
				return 'fail';
			}
		}

		public function list_user()
		{
			$sql = "SELECT * FROM users";
			$this->query($sql);
			$result = array();
			$i=0;
			while($data = $this->fetch_assoc())
			{
				$result[i] = array('userID' => $data['userid'], 'firstName' => $data['fname'], 'lastName' => $data['lname'], 'userEmail' => $data['email'], 'userName' => $data['username'], 'userPass' => $data['password'], 'userLevel' => $data['level']);
				$i++;
			}
			return $result;
		}

		public function register()
		{
			$sql = "SELECT userid FROM users WHERE username = '$this->userName' ";
			$this->query($sql);
			if($this->num_rows()==0)
			{
				$sql = "INSERT INTO users(
			    				fname,
			    				lname,			   		
			    				email,
			    				username,
			    				password) VALUES 
			    				('$this->firstName',
			    				'$this->lastName',
			    				'$this->userEmail',
			    				'$this->userName',
								'$this->userPass')";
				$this->query($sql);				
			}
			else
			{
				return 'fail';
			}
		}
	}
?>
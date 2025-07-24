<?php

require_once('include/classes/database.php');

class USER
{

	private $account;
	private $player;
	private $sqlite;
	private $conn;
	
	public function __construct($host, $user, $password)
	{
		$database = new Database();
		
		$account = $database->dbConnection($host, "account", $user, $password);
		$this->account = $account;
		
		$player = $database->dbConnection($host, "player", $user, $password);
		$this->player = $player;
		
		$sqlite = $database->dbConnection("", "", "", "", "yes");
		$this->sqlite = $sqlite;
		
		$log = $database->dbConnection($host, "log", $user, $password);
		$this->log = $log;
    }
	
	public function runQueryAccount($sql)
	{
		$stmt = $this->account->prepare($sql);
		return $stmt;
	}
	
	public function runQueryPlayer($sql)
	{
		$stmt = $this->player->prepare($sql);
		return $stmt;
	}
	
	public function runQuerySqlite($sql)
	{
		$stmt = $this->sqlite->prepare($sql);
		return $stmt;
	}
	
	public function execQuerySqlite($sql)
	{
		$stmt = $this->sqlite->exec($sql);
		return $stmt;
	}
	
	public function runQueryLog($sql)
	{
		$stmt = $this->log->prepare($sql);
		return $stmt;
	}
	
	public function getSqliteBonuslastInsertId()
	{
		$last = $this->sqlite->lastInsertId();
		return $last;
	}
	
	public function doLogin($login,$password)
	{
		$password = getHashPassword($password);
		try
		{
			if(isValidEmail($login))
				$stmt = $this->account->prepare("SELECT id, status, password FROM account WHERE email=:login AND password=:password");
			else
				$stmt = $this->account->prepare("SELECT id, status, password FROM account WHERE login=:login AND password=:password");
			$stmt->execute(array(':login'=>$login, ':password'=>$password));
			
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if($userRow['status']=='OK')
				{
					if(check_account_column('availDt') && check_availDt($userRow['id']))
						return array(5, getLoginLastBanReason($userRow['id']), get_availDt($userRow['id']));
					$_SESSION['id'] = $userRow['id'];
					$_SESSION['password'] = securityPassword($userRow['password']);
					$_SESSION['fingerprint'] = md5($_SERVER['HTTP_USER_AGENT'] . 'x' . $_SERVER['REMOTE_ADDR']);
					return array(1);
				}
				else
					return array(2, getLoginLastBanReason($userRow['id']));
			} else {
				if(isValidEmail($login))
					return array(4);
				else
					return array(3);
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['id']))
		{
			return true;
		}
		else return false;
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['password']);
		unset($_SESSION['fingerprint']);
		return true;
	}
}
?>
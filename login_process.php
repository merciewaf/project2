<?php
	session_start();
	require_once 'dbconfig.php';

	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$user_email = trim($_POST['user_email']);
		$user_password = trim($_POST['password']);
		
		$password = ($user_password);
		
		try
		{	
			$statement = $db_con->prepare("SELECT * FROM tbl_users1 WHERE user_email=:email");
			$statement->execute(array(":email"=>$user_email));
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$count = $statement->rowCount();
			
			if($row['user_password']==$password){
				
				echo "Successfully Login"; // log in
				$_SESSION['user_session'] = $row['user_id'];
				 echo "<script> window.location.assign('home.php'); </script>";
			}
			else{
				echo "Email or password does not exist."; // wrong details 
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>
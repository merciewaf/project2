<?php
session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}
?>
<!DOCTYPE >
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="script.js"></script>

</head>

<body>
    
<div class="signin-form">
	<div class="container">
       <form class="form-signin" method="post" id="login-form">
        <h2 class="form-signin-heading" style="text-align:center;">Log In </h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="username . . . . ." name="user_email" id="user_email" autofocus="autofocus" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password . . . . . " name="password" id="password" />
        </div>
		
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> Sign In
			</button> 
        </div>  
      </form>
    </div>
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
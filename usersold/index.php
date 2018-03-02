<html>
<head>
<title>bizoft</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="jquery.easing.min.js" type="text/javascript"></script>

</head>
<body>
<!--<div id="mhead"><h2>Add users</h2></div>-->
<div class="row">
		
<div id="">
<p id="msg"></p>
<ul id='navigate'>
  <li class="navi_sec active"><a id="add_user">Add User</a></li>
  <li class="navi_sec"><a id='show_user'>All Users</a></li>
</ul>
<div id="add_user_sec" class="user_section">
   <form name='signup' id='signup'>
      <div class='row'>
	       <p><label for='username'>First name</label>
		    <input type='text' name='firstname' id='firstname' value='' placeholder='Enter First name' /></p>
	   </div>
	   <div class='row'>
	       <p><label for='lastname'>Last name</label>
		    <input type='text' name='lastname' id='lastname' value='' placeholder='Enter Last name' /></p>
	   </div>
	   <div class='row'>
	       <p><label for='email'>Email</label>
		    <input type='text' name='email' id='email' value='' placeholder='Enter Email' /></p>
	   </div>
	   <div class='row'>
	        <p><label for='favjob'>Favourite Job</label>
			 <input type='text' name='favjob' id='favjob' value='' placeholder='Enter Favorite Job' /></p>
	      
	   </div>
	   <input type="hidden" name="actionfunction" value="saveData" />
	   <div class='row'>
	       <input type='button' id='formsubmit' class='submit' value='Submit' />
		   
	   </div>
   </form>
</div>
<div id="show_user_sec" class="user_section">
<table id='userists' cellspacing="0">
      
</table>
</div>
<div id="update_user_sec" class="user_section">

</div>
</div>
			
			
			
					

	</div>

<script type="text/javascript" src="script.js"></script>
 
</html>
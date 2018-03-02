<?php
include('db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con,$limit,$adjacent);
}
function saveData($data,$con){
  
  $fname = $data['firstname'];
  $lname = $data['lastname'];
  $email = $data['email'];
  $favjob = $data['favjob'];
  $sql = "insert into crudtable(firstname,lastname,email,favjob) values('$fname','$lname','$email','$favjob')";
  if($con->query($sql)){
    echo "added";
  }
  else{
  echo "error";
  }
  
}
function editUser($data,$con){
  $userid = $data['user'];
  $userid = base64_decode($userid);
   $sql = "select * from crudtable where id=$userid";
  $user = $con->query($sql);
    if($user->num_rows>0){
   $user = $user->fetch_array(MYSQLI_ASSOC);
  ?>
  <form name='signup' id='signup'>
      <div class='row'>
	       <p><label for='username'>First name</label>
		    <input type='text' name='firstname' id='firstname' value='<?php echo $user['firstname']?>' placeholder='Enter First name' /></p>
	   </div>
	   <div class='row'>
	       <p><label for='lastname'>Last name</label>
		    <input type='text' name='lastname' id='lastname' value='<?php echo $user['lastname']?>' placeholder='Enter Last name' /></p>
	   </div>
	   <div class='row'>
	       <p><label for='email'>Email</label>
		    <input type='text' name='email' id='email' value='<?php echo $user['email']?>' placeholder='Enter Email' /></p>
	   </div>
	   <div class='row'>
	        <p><label for='favjob'>Favourite Job</label>
			 <input type='text' name='favjob' id='favjob' value='<?php echo $user['favjob']?>' placeholder='Enter Favorite Job' /></p>
	      
	   </div>
	   <input type="hidden" name="actionfunction" value="updateData" />
	   <input type="hidden" name="user" value="<?php echo base64_encode($user['id']) ?>" />
	   <div class='row'>
	       <input type='button' id='updatesubmit' class='submit' value='Update' />
		   
	   </div>
   </form>
  <?php } 
}
function showData($data,$con,$limit,$adjacent){
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
   
  $sql = "select * from crudtable order by id asc";
  $rows  = $con->query($sql);
  echo $rows  = $rows->num_rows;
  
  $sql = "select * from crudtable order by id asc limit $start,$limit";
  
  $data = $con->query($sql);
  $str='<tr class="head"><td>Firstname</td><td>Lastname</td><td>Email</td><td>Favourite Job</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr id='".$row['id']."'><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td>".$row['favjob']."</td><td><input type='button' class='ajaxedit' value='Edit' user='".base64_encode($row['id'])."' /> <input type='button' class='ajaxdelete' value='Delete' user='".base64_encode($row['id'])."' ></td></tr>";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }   
$str = $str."<tr><td colspan='5'>".pagination($limit,$adjacent,$rows,$page)."</tr></tr>";
echo $str;  
}
function updateData($data,$con){
  $fname = $data['firstname'];
  $lname = $data['lastname'];
  $favjob = $data['favjob'];
  $email = $data['email'];
  $user = $data['user'];
  $user = base64_decode($user);
  $sql = "update crudtable set firstname='$fname',lastname='$lname',email='$email',favjob='$favjob' where id=$user";
  if($con->query($sql)){
    echo "updated";
  }
  else{
   echo "error";
  }
  }
  function deleteUser($data,$con,$limit,$adjacent){
    $user = $data['user'];
    $user = base64_decode($user);	
	$sql = "delete from crudtable where id=$user";
	if($con->query($sql)){
	  showData($data,$con,$limit,$adjacent);
	}
	else{
	echo "error";
	}
  }
function pagination($limit,$adjacents,$rows,$page){	
	$pagination='';
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	echo $prev = $page - 1;							//previous page is page - 1
	echo $next = $page + 1;							//next page is page + 1
	
	echo $lastpage = ceil($rows/$limit);	
	
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a class='page-numbers' href=\"?page=$prev\">previous</a>";
		else{
			//$pagination.= "<span class=\"disabled\">previous</span>";	
			}
		
		//pages	
		if ($lastpage < 5 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 3 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
				}
				
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
				}
				
			}
			//close to end; only hide early pages
			else
			{
			
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"$?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a class='page-numbers' href=\"?page=$next\">next</a>";
		else{
			//$pagination.= "<span class=\"disabled\">next</span>";
			}
		$pagination.= "</div>\n";		
	}

	return $pagination;  
}


?>
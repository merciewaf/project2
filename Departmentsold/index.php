<?php
	include('conn.php');
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>bizoft</title>
	</head>
<body>
	

	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">Add Departments</h2></center>
					<hr>
				<div>
					<form class = "">
						<div class = "form-group">
							<label>Department:</label>
							<input type  = "text" id = "department_name" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Notes:</label>
							<input type  = "text" id = "notes" class = "form-control">
						</div>
						<div class = "form-group">
							<button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#addnew', function(){
			if ($('#department_name').val()=="" || $('#notes').val()==""){
				alert('Please input data first');
			}
			else{
			$dep=$('#department_name').val();
			$notes=$('#notes').val();				
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						department_name: $dep,
						notes: $notes,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						dep_id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$dep_id=$(this).val();
			$('#edit'+$dep_id).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$dep=$('#department_name'+$dep_id).val();
			$notes=$('#notes'+$dep_id).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $dep_id,
						department_name: $name,
						notes: $notes,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
	
	});
	
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
</html>
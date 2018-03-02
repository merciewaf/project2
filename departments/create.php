<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$sname = $notes = "";
$sname_err = $notes_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_sname = trim($_POST["source_name"]);
    if(empty($input_sname)){
        $sname_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["source_name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $sname_err = 'Please enter a valid name.';
    } else{
        $sname = $input_sname;
    }
    
    // Validate address
    $input_notes = trim($_POST["notes"]);
    if(empty($input_notes)){
        $notes_err = 'Please enter a note.';     
    } else{
        $notes = $input_notes;
    }
    
   
    // Check input errors before inserting in database
    if(empty($sname_err) && empty($notes_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sources (source_name, notes) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_sname, $param_notes);
            
            // Set parameters
            $param_sname = $sname;
            $param_notes = $notes;
            //$param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a source.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($sname_err)) ? 'has-error' : ''; ?>">
                            <label>Source</label>
                            <input type="text" name="source_name" class="form-control" value="<?php echo $sname; ?>">
                            <span class="help-block"><?php echo $sname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($notes_err)) ? 'has-error' : ''; ?>">
                            <label>Notes</label>
                            <textarea name="notes" class="form-control"><?php echo $notes; ?></textarea>
                            <span class="help-block"><?php echo $notes_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
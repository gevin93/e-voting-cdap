<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		//print_r('t1');
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare("SELECT * FROM candi WHERE nic ='$id'");
		//print_r($id);
		//print_r($stmt_edit);
		$stmt_edit->execute(array(':nic'=>$nic));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{

		print_r('t1');
		$nic = $_POST['nic'];
		$name = $_POST['name'];// user name
		$cur_position = $_POST['cur_position'];// user email
		$file = $_POST['file'];
			
		print_r($nic);	
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$file = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['file']);
					move_uploaded_file($tmp_dir,$upload_dir.$file);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$file = $edit_row['file']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			print_r('test2');
			$stmt = $DB_con->prepare('UPDATE candi 
									     SET name=:name, 
										     cur_position=:cur_position, 
										     file=:file 
								       WHERE nic=:nic');
			//$nic=41351;
			
			$stmt->bindParam(':name',$name);			
			$stmt->bindParam(':cur_position',$cur_position);
			$stmt->bindParam(':file',$file);
			$stmt->bindParam(':nic',$nic);
			//	print_r($stmt);
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bit Secure Voting System</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">EDIT Candidate <a class="btn btn-primary" href="index.php"> <span class="glyphicon glyphicon-plus"></span> All Candidates </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">NIC</label></td>
        <td><input class="form-control" type="text" name="nic" value="<?php echo $nic; ?>" required /></td>
    </tr>	
    <tr>
    	<td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="name" value="<?php echo $name; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Current Position</label></td>
        <td><input class="form-control" type="text" name="cur_position" value="<?php echo $cur_position; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Image.</label></td>
        <td>
        	<p><img src="user_images/<?php echo $file; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="file" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="index.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>



</div>
</body>
</html>
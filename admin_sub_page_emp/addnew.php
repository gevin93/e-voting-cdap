<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$pin = $_POST['pin'];		
		$nic = $_POST['nic'];
		$name = $_POST['name'];// user name
		$hashcode = $_POST['hashcode'];// user email
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($name)){
			$errMSG = "Please Enter name.";
		}
		else if(empty($pin)){
			$errMSG = "Please Enter pin.";
		}
		
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else if(empty($nic)){
			$errMSG = "Please Select NIC.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO emp(pin,nic,name,hashcode,file) VALUES(:pin, :nic, :name, :hashcode, :upic)');

			$hashcode=uniqid();
			$stmt->bindParam(':pin',$pin);
			$stmt->bindParam(':nic',$nic);
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':hashcode',$hashcode);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
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

</head>
<body>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">Employee Profiles <a class="btn btn-primary" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp;  View All </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">PIN.</label></td>
        <td><input class="form-control" type="number" name="pin" placeholder="Enter PIN" value="<?php echo $pin; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">NIC.</label></td>
        <td><input class="form-control" maxlength="10" type="text" name="nic" placeholder="Enter NIC" value="<?php echo $nic; ?>" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Name.</label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Enter Username" value="<?php echo $name; ?>" /></td>
    </tr>
    

    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
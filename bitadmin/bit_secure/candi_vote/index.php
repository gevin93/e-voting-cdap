<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT * FROM candi WHERE nic =:nic');
		$stmt_select->execute(array(':nic'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['file']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM candi WHERE nic =:nic');
		$stmt_delete->bindParam(':nic',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Bit Secure Voting System</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body>

<div class="container">

	<div class="page-header">
    	<center><h1>Ballot Paper</h1></center>
    	  </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT * FROM candi ORDER BY nic DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $name."&nbsp;/&nbsp;".$cur_position; ?></p>
				<img src="user_images/<?php echo $row['file']; ?>" class="img-rounded" width="250px" height="250px" />
				<p class="page-header">
				<span>
				<a class="btn btn-block btn-lg btn-success" href="editform.php?edit_id=<?php echo $row['nic']; ?>" title="Press here to vote" onclick="return confirm('sure to edit ?')"><span class="fa fa-play"></span> Vote</a> 

				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	




</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/a439d3cf1e.js"></script>

</body>
</html>
<?php

$nic = filter_input(INPUT_POST, 'nic');
$name = filter_input(INPUT_POST, 'name');
$cur_position = filter_input(INPUT_POST, 'cur_position');
$file = filter_input(INPUT_POST, 'file');


if( (!empty($nic))&& (!empty($name))&& (!empty($cur_position))&& (!empty($file)) ){

                $host = "localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="candidate";

             //create connection
             
             $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


             if (mysqli_connect_error()){
                 die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
             }
             else{
                $sql = "INSERT INTO candi values('$nic','$name','$cur_position','$file')";
		}
                if($conn->query($sql)){

                    echo "NEW RECORD IS INSERTED";
                }
                else{
                    echo "ERROR IN RECORD INSERTION ".$sql."<br>".$conn->error;
                }
                $conn->close();

}
    
else{
    echo "must not be empty";
    die();
}

?>

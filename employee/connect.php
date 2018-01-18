<?php

$nic = filter_input(INPUT_POST, 'nic');
$username = filter_input(INPUT_POST, 'username');
$telephone = filter_input(INPUT_POST, 'telephone');
$email = filter_input(INPUT_POST, 'email');
$pin = filter_input(INPUT_POST, 'pin');
//$hashcode = "xxx";

if( (!empty($nic))&& (!empty($username))&& (!empty($telephone))&& (!empty($email))&& (!empty($pin)) ){

                $host = "localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="employee";

             //create connection
             
             $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


             if (mysqli_connect_error()){
                 die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
             }
             else{
                $sql = "INSERT INTO emp values('$nic','$username','$telephone','$email','$pin','$hashcode')";
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

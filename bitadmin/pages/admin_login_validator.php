<?php
// connect to mysql database
$con = mysqli_connect("localhost", "root", "", "Admin") or die("Error " . mysqli_error($con));

// check if form is submitted
if (isset($_POST['submit']))
{
    $usr= mysqli_real_escape_string($con, $_POST['ID']);
    $pswd= mysqli_real_escape_string($con, $_POST['password']);
   // $pswd= "1";
    //$upwd = mysqli_real_escape_string($con, $_POST['password']);
    //$result = mysqli_query($con, "SELECT Admin_ID FROM Admin_log WHERE Admin_ID = '" . $usr. "'");
    //$res = mysqli_query($con, "SELECT password_f FROM Admin_log WHERE Admin_ID = '" . $usr. "'");


    $result = mysqli_query($con, "SELECT * FROM Admin_log  WHERE Admin_ID  = '" . $usr. "'");

    while($row=mysqli_fetch_array($result))
    {
        $str1=$row['Admin_ID'];
        $str2=$row['password_f'];
    }


    if ($usr==$str1)
    {
        // login successful - start user session, store data in session & redirect user to index or dashboard page as per your need
        //header("Location: admin_login.php?err=true");
        if($pswd==$str2)
        {

           // $row = mysqli_fetch_array($result);

            //session_start();
            //$_SESSION['user_id'] = $row['id'];
           // $_SESSION['user_name'] = $row['name'];
           // header("Location:http://localhost/bitadmin/pages/index.html"); //change this
            header("Location:http://localhost/bitadmin/pages/main.html");
        }
   
        else
        {
            // login failed
            header("Location: index.php?err=true");
            
        }
      
    }
    else
    {
        // login failed
        header("Location: index.php?err=true");
        
    }
}
?>
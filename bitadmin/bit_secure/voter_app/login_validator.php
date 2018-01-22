<?php
// connect to mysql database
$con = mysqli_connect("localhost", "root", "", "voter") or die("Error " . mysqli_error($con));

// check if form is submitted
if (isset($_POST['submit']))
{
    $usr = mysqli_real_escape_string($con, $_POST['username']);
   // $upwd = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM emp WHERE pin = '" . $usr. "'");

    if (mysqli_num_rows($result) > 0)
    {
        // login successful - start user session, store data in session & redirect user to index or dashboard page as per your need
        
        $row = mysqli_fetch_array($result);

        //session_start();
        //$_SESSION['user_id'] = $row['id'];
       // $_SESSION['user_name'] = $row['name'];
        header("Location:http://localhost/bit_secure/voter_app/ballot.php"); //change this
    }
    else
    {
        // login failed
        header("Location: index.php?err=true");
    }
}
?>
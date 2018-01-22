<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bit Secure Voting System</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <style type="text/css">
    #login-form .input-group, #login-form .form-group {
        margin-top: 30px;
    }
    
    #login-form .btn-default {
        background-color: #EEE;
    }
    
    .brand {
        color: #CCC;
    }

    .span {
        color: red;
    }
    </style>





    </head>



    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Bit Secure Voting System</strong> Login</h1>
                            <div class="description">
                                <p>
                                    E-Voting System for ABC Company Pvt LTD
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Please Login to Continue</h3>
                                    <p>Enter your PIN number:</p>
                                    
                                    <?php if (isset($_GET['err'])) { ?>
                                        <span class=" text-center span"><?php echo "Login failed! Invalid PIN number"; ?></span>
                                        <?php } ?>

                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="login_validator.php"   method="post" class="login-form">
                                
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="password" name="username" placeholder="Enter PIN number..." class="username form-control" id="username">
                                    </div>
                                    <div class="form-group">
                        <input type="submit" name="submit" value="Proceed" onclick="sendmessage3();" class="btn btn-danger btn-block" />
                    </div>
                                   </a>
                                </form>
                        
                            </div>
                        </div>
                        
                    </div>

                    </div>
                </div>
            </div>

        </div>


        
        <?php
        //include('login_validator.php');
       $con = mysqli_connect("localhost", "root", "", "voter") or die("Error " . mysqli_error($con));

           //$con = mysqli_connect("localhost", "root", "", "voter") or die("Error " . mysqli_error($con));
       $usr1 = "123";
       $result = mysqli_query($con, "SELECT * FROM emp WHERE pin = '" . $usr1. "'");


   if (mysqli_num_rows($result) > 0)
       {


               $result = mysqli_query($con, "SELECT * FROM emp WHERE pin = '" . $usr1. "'");

               while($row=mysqli_fetch_array($result))
               {
                   $str1=$row['nic'];
                   $str2=$row['hashcode'];
               }
           $con->close();
       }
    

           

?>


   <script type="text/javascript">
        
        var nic = "<?php echo $str1 ?>";
        var hash = "<?php echo $str2 ?>";
     
        var webSocket=new WebSocket("ws://localhost:9091/mavenproject1/hashcatcher");
       //var webSocket1=new WebSocket("ws://localhost:1245/mavenproject1/NICcatcher");

       function sendmessage3()
           {

               webSocket.send(hash);
               //webSocket1.send(nic);

           }
   </script>
 







        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

        

    </body>





</html>

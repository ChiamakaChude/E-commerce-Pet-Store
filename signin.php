<?php  session_start(); ?>
<!DPCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    
        
    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="logo1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <?php
           

            $servername="localhost";
            $username="root";
            $password="";
            $dbname="pet_app";

            $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            if (isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]===true)
            {
                $myemail=$_SESSION['email'];
                
                $name=$conn->query("SELECT firstname, lastname FROM user_info WHERE email='$myemail'")->fetch();
                
                $message="You are alreay logegd in ".ucwords($name['firstname'])." ".ucwords($name['lastname']);
                echo "<script>alert('$message');</script>";
                echo "<script>window.location.href='index.php';</script>";
                exit;
            }
    ?>
       <script>
            function openNav() 
            {
                document.getElementById("side").style.width = "240px";
            }

            /* Set the width of the side navigation to 0 */
            function closeNav() 
            {
                document.getElementById("side").style.width = "0";
            }
        </script>
    <!-- Place your stylesheet here-->
    <link href="pet-app.css" rel="stylesheet">
        <title>
            Pet City|Sign In
        </title>
    </head>
    
    <body id="body" style="background-image: url(pet-group-photo.jpg); background-size: cover;">
        <?php include 'navbar.php'; ?>
        <?php
            $email=$password1="";
            $emailer=$passworder="";
            $emailer1=$passworder1="";
            $errors=0;
        
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            if($_SERVER["REQUEST_METHOD"]=="POST") //validates input
            {   
                    $email=test_input($_POST["email"]); 
                    $password1=test_input($_POST["password1"]);
                
                    if(empty($_POST["email"]))
                    {
                        $emailer="Fill in your E-mail address";
                        $emailer1="<script>document.getElementById('email').style.borderColor='red';</script>";
                        $errors++;
                    }
                    else
                    {
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)===false)
                        {
                            $emailer1="<script>document.getElementById('email').style.borderColor='black';</script>";
                        }
                        else
                        {
                            $emailer="Email is not valid";
                            $emailer1="<script>document.getElementById('email').style.borderColor='red';</script>";
                            $errors++;
                        }
                    }
                    if(empty($_POST["password1"]))
                    {
                        $passworder="Type your password";
                        $passworder1="<script>document.getElementById('password1').style.borderColor='red';</script>";
                        $errors++;
                    }
                
                    
                        
                $email_data = $conn->query("SELECT email FROM user_info WHERE email='$email'")->fetch();
    
                if ($email_data['email']==$email)
                        {}
                    else
                    {
                        $emailer="Email is not registered";
                        $emailer1="<script>document.getElementById('email').style.borderColor='red';</script>";
                        $errors++;
                    }
                        
            $password_data = $conn->query("SELECT `password` FROM user_info WHERE email='$email'")->fetch();
                    $pass=base64_decode($password_data['password']);
                    if ($pass==$password1)
                    {}
                    else
                    {
                    $passworder="Incorrect password";
                    $passworder1="<script>document.getElementById('password1').style.borderColor='red';</script>";
                    $errors++;
                }
            }
        ?>
        <form id="form" method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <br><br>
        <div>
            <img src="logo1.png" id="signlogo"><br>
            <br>
            <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-mail" id="email" value="<?php echo $email; ?>"><span class="error"><?php echo "<p style='color:red;'>$emailer</p>"; echo $emailer1; ?></span><br>
            </div>
            <div class="form-group">
            <input type="password" name="password1" class="form-control" placeholder="Password" id="password1" value="<?php echo $password1; ?>"><span class="error"><?php echo "<p style='color:red;'>$passworder</p>"; echo $passworder1; ?></span><br>
            </div>
            <button type="submit" class="btn btn-primary" name="signin">Sign In</button>
            <br>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
        </form>
        <?php 
           if($errors==0 && $_SERVER['REQUEST_METHOD']=='POST') //signs user in if there are no errors
            {
                $message="Signed in successfully";
                echo "<script>alert('$message');</script>";
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                echo "<script>window.location.href='index.php';</script>";
            }
        ?>
        
    </body>
</html>
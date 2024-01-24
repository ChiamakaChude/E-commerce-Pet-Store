<?php session_start(); ?>
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
                
                $name=$conn->query("SELECT firstname,lastname FROM user_info WHERE email='$myemail'")->fetch();
                
                $message="You cannot register if you are logged in ".ucwords($name['firstname'])." ".ucwords($name['lastname']);
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
        <title>Pet City|Sign Up</title>
    </head>
    
    <body id="bod" style="background-image: url(pet-group-photo.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <?php include 'navbar.php'; ?>
        <br>
        <?php     
            $firstname=$lastname=$email=$number=$country=$password1=$password2="";
            $firstnameer=$lastnameer=$emailer=$countryer=$numberer=$password1er=$password2er="";
            $firstnameer1=$lastnameer1=$emailer1=$numberer1=$countryer1=$password1er1=$password2er1="";
            $errors=0;
            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
        
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $firstname=test_input($_POST["firstname"]);
                $lastname=test_input($_POST["lastname"]);  
                $email=test_input($_POST["email"]);
                $number=test_input($_POST["number"]);
                $country=$_POST["country"];
                $password1=test_input($_POST["password1"]);
                $password2=test_input($_POST["password2"]);  
                
                if(empty($_POST["firstname"]))
                {
                    $firstnameer="Fill in your first name";
                    $firstnameer1="<script>document.getElementById('firstname').style.borderColor='red';</script>";
                    $errors++;
                }
                elseif (!preg_match("/^[a-z A-Z ]*$/",$firstname))
                {
                    $firstnameer="Only letters allowed please";
                    $firstnameer1="<script>document.getElementById('firstname').style.borderColor='red';</script>";
                    $errors++;
                    
                }
                
                
                if(empty($_POST["lastname"]))
                {
                    $lastnameer="Fill in your last name";
                    $lastnameer1="<script>document.getElementById('lastname').style.borderColor='red';</script>";
                    $errors++;
                }
                elseif(!preg_match("/^[a-z A-Z ]*$/",$lastname))
                {
                        $lastnameer="Only letters allowed please";
                        $lastnameer1="<script>document.getElementById('lastname').style.borderColor='red';</script>";
                        $errors++;
                }
                
                
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
                
                
                if(empty($_POST["number"]))
                {
                    $numberer="Fill in your phone number";
                    $numberer1="<script>document.getElementById('number').style.borderColor='red';</script>";
                    $errors++;
                }
               else
                {
                    $num=preg_match('@[0-9]@',$number);
                    if(!$num||strlen($number)<11||strlen($number)>11)
                {
                        $numberer="Only numbers allowed and shouldn't be more or less than 11 characters";
                        $numberer1="<script>document.getElementById('number').style.borderColor='red';</script>";
                        $errors++;
                }
                    
                }
                
                if(isset($_POST['country']))
                {
                    switch($country)
                    {
                        case 'select':
                            $countryer="Select a country";
                            $countryer1="<script>document.getElementById('country').style.borderColor='red';</script>";
                            $errors++;
                            break;
                        case 'algeria':
                            $country='Algeria';
                            break;
                            
                        case 'cameroon':
                            $country='Cameroon';
                            break;
                            
                        case 'congo':
                            $country='Congo';
                            break;
                            
                        case 'egypt':
                            $country='Egypt';
                            break;
                            
                        case 'ethiopia':
                            $country='Ethiopia';
                            break;
                            
                        case 'gambia':
                            $country='Gambia';
                            break;
                            
                        case 'ghana':
                            $country='Ghana';
                            break;
                            
                        case 'kenya':
                            $country='Kenya';
                            break;
                            
                        case 'morocco':
                            $country='Morocco';
                            break;
                            
                        case 'nigeria':
                            $country='Nigeria';
                            break;
                            
                        case 'senegal':
                            $country='Senegal';
                            break;
                    
                        case 'sa':
                            $country='South Africa';
                            break;
                            
                        case 'togo':
                            $country='Togo';
                            break;
                            
                        case 'zimbabwe':
                            $country='Zimbabwe';
                            break;
                            
                        default:
                            $countryer="Select a country";
                            $countryer1="<script>document.getElementById('country').style.borderColor='red';</script>";
                            $errors++;    
                    }
                }
                          
                          
                if(empty($_POST["password1"]))
                    {
                        $password1er="Type a password";
                        $password1er1="<script>document.getElementById('password1').style.borderColor='red';</script>";
                        $errors++;
                    }
                else
                {
                    $cases = preg_match('@[a-z A-Z]@', $password1);
                    $no= preg_match('@[0-9]@', $password1);
                    
                    if (!$cases||!$no||strlen($password1)<8)
                    {
                        $password1er="Password should contain at least 8 charcters and should contain at least 1 number and 1 letter";
                        $password1er1="<script>document.getElementById('password1').style.borderColor='red';</script>";
                        $password2er1="<script>document.getElementById('password2').style.borderColor='red';</script>";
                        $errors++;
                    }
                }
                          
                          
                if(empty($_POST["password2"]))
                {
                    $password2er="Re-type your password";
                    $password2er1="<script>document.getElementById('password2').style.borderColor='red';</script>";
                    $errors++;
                }
                else
                {
                    if ($password2!=$password1)
                    {
                        $password2er="The password does not match";
                        $password2er1="<script>document.getElementById('password2').style.borderColor='red';</script>";
                        $errors++;
                    }
                }
                
                $date=date("Y-m-d H:i:s");
                
                    
                        //checks if email already exists in database
                        $email_data = $conn->query("SELECT email FROM user_info")->fetchAll();
                        foreach ($email_data as $row) 
                        {
                            if ($row['email']==$email)
                            {
                                $emailer="Email already exists";
                                $emailer1="<script>document.getElementById('email').style.borderColor='red';</script>";
                                $errors++;
                            }
                        }
                        
                
                //checks if phone number already exists in database
                        $phone_no_data = $conn->query("SELECT phone_no FROM user_info")->fetchAll();
                        foreach ($phone_no_data as $row) 
                        {
                            if ($row['phone_no']==$number)
                            {
                                $numberer="Phone number already exists";
                                $numberer1="<script>document.getElementById('number').style.borderColor='red';</script>";
                                $errors++;
                            }
                        }
                 }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <div id="form">
            <img src="logo1.png" id="signlogo"><br>
            <h4><b>Sign Up</b></h4>
            <div class="form-group"> 
                <br><input type="text" name="firstname" class="form-control" placeholder="First Name" id="firstname" value="<?php echo $firstname; ?>"><span class="error"><?php echo "<p style='color:red;'>$firstnameer</p>"; echo $firstnameer1; ?></span>
            </div>
            <div class="form-group"> 
               <input type="text" name="lastname" class="form-control" placeholder="Last Name" id="lastname" value="<?php echo $lastname; ?>"><span class="error"><?php echo "<p style='color:red;'>$lastnameer</p>"; echo $lastnameer1; ?></span>
            </div>
           
             
           
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail" id="email" value="<?php echo $email; ?>"><span class="error"><?php echo "<p style='color:red;'>$emailer</p>"; echo $emailer1; ?></span>
            </div>
            <div class="form-group">
                <input type="text" name="number" class="form-control" placeholder="Phone Number" id="number" value="<?php echo $number; ?>"><span class="error"><?php echo "<p style='color:red;'>$numberer</p>"; echo $numberer1; ?></span>
            </div>
            
             <div class="form-group">
                 <select class="form-control" name="country" id="country" value="<?php echo $country; ?>">
                     <option value="select">Select a country</option>
                     <option value="algeria">Algeria</option>
                     <option value="cameroon">Cameroon</option>
                     <option value="congo">Congo</option>
                     <option value="egypt">Egypt</option>
                     <option value="ethiopia">Ethiopia</option>
                     <option value="gambia">Gambia</option>
                     <option value="ghana">Ghana</option>
                     <option value="kenya">Kenya</option>
                     <option value="morocco">Morocco</option>
                     <option value="nigeria">Nigeria</option>
                     <option valueame="senegal">Senegal</option>
                     <option value="sa">South Africa</option>
                     <option value="togo">Togo</option>
                     <option value="zimbabwe">Zimbabwe</option>
                 </select><span class="error"><?php echo "<p style='color:red;'>$countryer</p>"; echo $countryer1; ?></span>
            </div>
            
            <div  class="form-inline">
                <input type="password" name="password1" class="form-control" placeholder="Password" id="password1" value="<?php echo $password1; ?>"><span class="error"><?php echo "<p style='color:red;'>$password1er</p>"; echo $password1er1; ?></span>&ensp;
                <input type="password" name="password2" class="form-control" placeholder="Re-write Password" id="password2" value="<?php echo $password2; ?>"><span class="error"><?php echo "<p style='color:red;'>$password2er</p>"; echo $password2er1; ?></span>
            </div>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
            <br><br>
            <p>Already have an account? <a href="signin.php">Log in</a></p>
        </div>
        </form>
        <?php
                  if($errors==0 && $_SERVER["REQUEST_METHOD"]=="POST") //Insert information to the database if all requirements are filled correctly
                 {
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="pet_app";
                    $pass=base64_encode($password1);
                    try
                    {
                        $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                        
                        $sql="INSERT INTO user_info (firstname,lastname,email,phone_no,password,date_registered,country) VALUES ('$firstname','$lastname','$email','$number','$pass','$date','$country')";
                        $conn->exec($sql);
                        $message="Form Successfully Filled";
                        echo "<script type='text/javascript'>alert('$message');</script>"; 
                            
                    }
                    catch(PDOException $e)
                    {
                        echo $sql. "<br>". $e->getMessage();
                    }

                    $conn=null;
                 }
                else
                 {
                    
                 } 
            ?>
    </body>
</html>
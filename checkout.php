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
    <!-- Place your stylesheet here-->
    <link href="pet-app.css" rel="stylesheet">
                    
        <title>
            Pet City| Cart
        </title>
        <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="pet_app";

                    $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $remind=$conn->query("SELECT address FROM user_info WHERE email='".$_SESSION['email']."'")->fetch();
                    
                        if($remind['address']==="")
                        {
                            $message="Please fill in your address!";
                            echo "<script>alert('$message');</script>";
                        }
                    
                    $cart=$conn->query("SELECT user_cart.cart_product_id, products.image, products.product_name, products.product_price FROM user_cart INNER JOIN products ON user_cart.cart_product_id=products.product_id WHERE cart_email='".$_SESSION['email']."'")->fetchAll();
        
                    $user_details=$conn->query("SELECT firstname, lastname, address,phone_no FROM user_info WHERE email='".$_SESSION['email']."'")->fetch();
        
            ?>
    </head>
    
    <body onload="<?php //sleep(4);?>" style="background-color:whitesmoke;">
        <br>
        <?php include 'navbar.php'; ?>
        <?php
            //echo $_SESSION['price']." ".$_SESSION['delivery']." ".$_SESSION['total']." ".$_SESSION['email'];
        ?>
        <!--<script>
            document.write(window.innerWidth);
        </script>-->
        <div class="container">
            <div class="container" id="checkout-container">
                <br>
                <h4>CHECKOUT</h4><hr>
                <!-- Address Details -->
                <?php 
                    $fname=$surname=$addres="";
                    $number=0;
                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $fname=strtolower($_POST['fname']);
                    $surname=strtolower($_POST['surname']);
                    $addres=strtolower($_POST['addres']);
                    $number=$_POST['num'];
                    
                    if(!empty($_POST['fname']))
                    {
                        $update=$conn->query("UPDATE user_info SET firstname='$fname' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    if(!empty($_POST['surname']))
                    {
                        $update=$conn->query("UPDATE user_info SET lastname='$surname' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    if(!empty($_POST['addres']))
                    {
                        $update=$conn->query("UPDATE user_info SET address='$addres' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    if(!empty($_POST['num']))
                    {
                        $update=$conn->query("UPDATE user_info SET phone_no='$number' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    echo "<meta http-equiv='refresh' content='0'>";
                }  
            ?>
                <div class="row">
                    <div class="col-10">
                        <p><i class="fa fa-check-circle fa-lg" style="color:forestgreen;"></i> Address Details</p>
                    </div>
                    <div class="col-2">
                        <a data-toggle="modal" data-target="#edit"><i class="fa fa-pencil fa-lg" style="text-align:center; color:black;"></i></a>
                    </div>
                </div>
                <div class="modal fade" id="edit" role="dialog">
                <div class="modal-dialog">
                <br>
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>
                <div class="modal-title" style="text-align:center; font-size:20px; font-weight:bold;">Edit Address</div>
                <div class="modal-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                        <div class="form-row mb-4">
                        <div class="col">
                            <label for="firstname" class="grey-text font-weight-light">First Name</label>
                            <input type="text" class="form-control" placeholder="<?php echo ucwords($user_details['firstname']); ?>" id="firstname" style="background-color:transparent;" name="fname" pattern="[A-Za-z]{1-20}" title="Only letters allowed">
                        </div>
                        <div class="col">
                            <label for="lastname" class="grey-text font-weight-light">Last Name</label>
                            <input type="text" class="form-control" name="surname" placeholder="<?php echo ucwords($user_details['lastname']); ?>" id="lastname" pattern="[A-Za-z]{1-20}" title="Only letters allowed">
                        </div>
                    </div>
                     <div class="form-row mb-4">
                        <div class="col">
                            <label for="number" class="grey-text font-weight-light">Phone Number</label>
                            <input type="text" class="form-control" placeholder="<?php echo $user_details['phone_no']; ?>" id="number" name="num" pattern="[0-9]{11}" title="Only 11 didgits allowed">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="grey-text font-weight-light">Address</label>
                        <input type="text" class="form-control" placeholder="<?php echo ucwords($user_details['address']); ?>" id="address" name="addres">
                    </div>
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button"  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
            </div>
            </div>
                <div id="adderss" class="container">
                    <?php
                        echo ucwords($user_details['firstname'])." ".ucwords($user_details['lastname']);
                        echo "<br>".ucwords($user_details['address']);
                        echo "<br>".$user_details['phone_no'];
                    ?>
                </div><br>
                
                <!-- Delivery Details -->
                <p><i class="fa fa-check-circle fa-lg" style="color:forestgreen;"></i> Delivery Method</p>
                <div id="payment" class="container">
                    
                        <form>
                            <input type="radio" checked>  <?php 
                            $date= date("l, d M Y");
                            if($_SESSION['delivery']=='Standard'|| $_SESSION['delivery']=='Instant') 
                            { 
                                echo $_SESSION['delivery']." Door Delivery <br>";
                                
                                if($_SESSION['delivery']=='Standard')
                                {
                                    echo "<br><div class='container' style='color:gray;'> Get it in Lagos by ".date("l, d M Y",strtotime($date.'+ 5 weekdays')).", allow up to 8 additional business days for other cities for ₦600.00 <br><i class='fa fa-info-circle'></i>  Large items (e.g A.C) may arrive 2 business days later than others.</div> ";
                                }
                                elseif($_SESSION['delivery']=='Instant')
                                {
                                    echo "<br><div class='container' style='color:gray;'> Get it in Lagos by ".date("l, d M Y",strtotime($date.'+ 2 weekdays')).", allow up to 8 additional business days for other cities for ₦1,200.00 <br><i class='fa fa-info-circle'></i>  Large items (e.g A.C) may arrive 2 business days later than others.</div>";
                                }
                            }
                            else
                            {
                                echo $_SESSION['delivery'];
                                echo "<br><div class='container' style='color:gray;'>Get it in Lagos by ".date("l, d M Y",strtotime($date.'+ 2 weekdays'))."for instant shipping, allow 3 extra business days for standard shipping items and 16 extra business days for items shipped from overseas. Allow up to 8 additional business days for other cities</div>";
                            }
                            ?>
                        </form>
                    <div class="row container">
                        <div class="col-6">
                            SUB-TOTAL(&#8358;)
                        </div>
                        <div class="col-6">
                            <p style="text-align:right"><?php  echo number_format($_SESSION['total'],2);?></p>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-6">
                            Delivery(&#8358;)
                        </div>
                        <div class="col-6">
                            <p style="text-align:right"><?php  echo number_format($_SESSION['price'],2);?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row container">
                        <div class="col-6">
                            <p style="font-weight:bold;">TOTAL</p>
                        </div>
                        <div class="col-6">
                            <p style="text-align:right; font-weight:bold;">&#8358;<?php  echo number_format($_SESSION['total']+$_SESSION['price'],2);?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Details -->
                <p><i class="fa fa-check-circle fa-lg" style="color:grey;"></i> Payment Method</p>
                <a href="summary.php"><button type="button" id="proceed" class="btn btn-success" <?php if($remind['address']==""){ ?> disabled="true" <?php }; ?> >Proceed To Payment</button></a>
                 
                    <br><br><br><br>
            </div>
            
            <!-- Cart Details -->
            <div  class="container fixed-right" id="summary">
                <h3 id="item_in_cart">Items in cart</h3><hr>
                <div class="row" id="cart-summary">
                <?php
                    foreach($cart as $key => $row)
                    {
                          ?>
                            <div class='card' id="summary-item">
                                <?php echo "
                                <div class='card-body'>
                                <img id='summary-image' class='card-image' src='uploads/".$row["image"]."' alt='Card Image'>
                                    <h6 class='card-title' id='p-name' span style='font-size:12px;'>".$row["product_name"]."</h6>
                                    <p>Price: <span style='font-weight:bold;'>&#8358;".number_format($row["product_price"],2)."</span></p>
                                </div>";?>
                            </div> <br><br>
                             <?php   
                    }
                ?>
            </div>
            </div>
        </div>
    </body>
</html>
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
        <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="pet_app";

                    $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $myemail=$_SESSION['email'];
            ?>
        <title>
            Pet City|Profile
        </title>
    </head>
    <body id="bod" onload="<?php //sleep(3);?>">
        <?php include 'navbar.php'; ?>
        <!--<h4><b>Profile</b></h4>-->
        <div class="container-fluid">
            <div class="sidebar" id="profile-menu">
                <ul class="nav nav-pills">
                    <li><a href="#my-account" data-toggle="pill"><i class="fa fa-user-o fa-lg"></i>&ensp;My Account</a></li>
                    <li><a href="#my-orders" data-toggle="pill"><i class="fa fa-shopping-basket fa-lg"></i>&ensp;My Orders</a></li>
                    <li><a href="#likes" data-toggle="pill"><i class="fa fa-thumbs-up fa-lg"></i>&ensp;Saved Items</a></li>
                    <li><a href="#edit-account" data-toggle="pill"><i class="fa fa-edit fa-lg"></i>&ensp;Edit Account</a></li>
                    <li><a data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out fa-lg"></i>&ensp;Log Out</a></li>
                </ul>
            </div>
            <div class="modal fade" id="logout" role="dialog">
                <div class="modal-dialog">
                <br>
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>
                <div class="modal-title" style="text-align:center; font-size:20px; font-weight:bold;">Are you sure you want to log out?</div>
                <div class="modal-body">
                    <a href="signout.php" id="signout"><button type="button" name="yes" class="btn btn-primary">Yes</button></a>
                    <button id="signout" type="button" data-dismiss="modal" class="btn btn-primary">No</button>
                </div>
            </div>
            </div>
            </div>
            
            <div class="tab-content">
            <div id="my-account" class="tab-pane fade in active">
                <p style="font-size:22px; color:black; font-weight:bold;">Account Overview</p>
                <?php 
                    $info=$conn->query("SELECT firstname,lastname, email, phone_no, address, gender, country FROM user_info WHERE email='$myemail'")->fetch();
                ?>
                <form id="account-form">
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="firstname" class="grey-text font-weight-light">First Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['firstname']); ?>" id="firstname" style="background-color:transparent;" readonly>
                        </div>
                        <div class="col">
                            <label for="larstname" class="grey-text font-weight-light">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['lastname']); ?>" id="lastname" readonly>
                        </div>
                    </div>
                     <div class="form-row mb-4">
                        <div class="col">
                            <label for="email" class="grey-text font-weight-light">E-mail</label>
                            <input type="text" class="form-control" value="<?php echo $info['email']; ?>" id="email" readonly>
                        </div>
                        <div class="col">
                            <label for="number" class="grey-text font-weight-light">Phone Number</label>
                            <input type="text" class="form-control" value="<?php echo $info['phone_no']; ?>" id="number" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="grey-text font-weight-light">Address</label>
                        <input type="text" class="form-control" value="<?php echo ucwords($info['address']); ?>" id="address" readonly>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="gender" class="grey-text font-weight-light">Gender</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['gender']); ?>" id="gender" readonly>
                        </div>
                        <div class="col">
                            <label for="country" class="grey-text font-weight-light">Country</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['country']); ?>" id="country" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="my-orders">
                <p style="font-size:30px; color:black; text-align:center;">My Orders</p>
                <?php
                    //$orders=$conn->query("SELECT orders.orders_id, orders.orders_product_id, user_order.date, user_order.payment_method, user_order.price, user_order.delivery_method FROM orders INNER JOIN user_order ON orders.orders_id=user_order.order_id WHERE user_order.order_email='".$_SESSION['email']."'")->fetchAll();
                
                    $orders=$conn->query("SELECT order_id, date, price FROM user_order WHERE order_email='".$_SESSION['email']."'")->fetchAll();
                
                    foreach($orders as $row)
                    {
                        /*$row["orders_product_id"];
                        $products=$conn->query("SELECT product_name, product_price, image FROM products WHERE product_id='".$row['orders_product_id']."'")->fetchAll();
                        foreach($products as $item)
                        {
                            ?>
                            <div class='card' style="border: none; height: 350px; width: 100%; margin-left: auto; margin-right: auto; padding-top: 10px;">
                                
                            <?php echo "
                            <div id='orderno'><p style='color:black; text-align:center;'>Order Number: ".$row['orders_id']."</p>
                                <p style='color:black; text-align:center;'>Date: ".$row['date']."</p></div>
                                <img id='prod' class='card-image-top col-sm-4' src='uploads/".$item["image"]."' alt='Card Image' style='height:60%; float:left;'>
                                <div class='card-body col-sm-4' style='float:right; position:absolute; bottom:50; right:200;'>
                                <p style='font-size:17px; color:black; text-align:center;'>Payment method: ".$row['payment_method']."</p>
                                <p style='font-size:17px; color:black; text-align:center;'>Delivery Method: ".$row['delivery_method']."</p>
                                <h6 class='card-title' id='p-name' style='color:black;'>".$item["product_name"]."</h6>
                                    <p style='color:black;'>&#8358;".number_format($item["product_price"],2)."</p>";?>
                                </div>
                            </div><br><br>
                    <?php }*/?>
                        <?php $order_id=base64_encode($row['order_id']); ?>
                     <a href="order-display.php?id=<?php echo $order_id; ?>" id="orders"><div class="row" style="width:100%;  border: 1px solid lightgray; border-radius: 6px;" id="orders-div">
                        <?php echo "
                            <div class='col-sm-6'> 
                                <span><p style='color:black;'> ".$row['order_id']."<br>".$row['date']."</p></span></div>
                            <div class='col-sm-6'>
                                <p style='color:black; font-weight:bold; text-align:right;'> &#8358;".number_format($row["price"],2)."</p>
                                </div>"; ?>
                         </div></a><br>
                   <?php }
                ?>
                </div>
            <div class="tab-pane fade" id="likes">
                <p style='font-size:30px; color:black; text-align:center;'>Liked Products <i class="fa fa-smile-o"></i></p>
                <div class="row">
                    <?php
                    $product_db=$conn->query("SELECT user_likes.product_id_fk, products.image, products.product_name, products.product_price FROM user_likes INNER JOIN products ON user_likes.product_id_fk=products.product_id WHERE email_fk='".$_SESSION['email']."'")->fetchAll();
                    foreach($product_db as $key => $row)
                    {
                        $product_id = $row['product_id'];
                          ?>
                            <div class='card' style="border: none; height: 350px; width: 100%; margin-left: auto; margin-right: auto; padding-top: 10px;">
                            <i id="<?php echo 'like'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'></i>
                                <?php echo "
                                <img id='prod' class='card-image-top col-md-4' src='uploads/".$row["image"]."' alt='Card Image' style='height:90%; float:left;'>
                                <div class='card-body col-md-4' style='float:right; position:absolute; bottom:50; right:200;'>
                                    <h6 class='card-title' id='p-name' style='color:black;'>".$row["product_name"]."</h6>
                                    <p style='color:black;'>&#8358;".number_format($row["product_price"],2)."</p>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                </div>
                            </div><br><br>
                            <?php    
                    }
                ?>
                </div>
                <?php
                if(isset($_SESSION['email']))
                {
                    $email=$_SESSION['email'];
                }
                ?>
                <script>
                       <?php include 'like-unlike.js';
                            include 'cart.js';
                       ?>
                </script>
            </div>
          <?php 
            $fname=$surname=$addres=$sex=$countr="";
            $number=0;
            if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                    $fname=strtolower($_POST['fname']);
                    $surname=strtolower($_POST['surname']);
                    $addres=strtolower($_POST['addres']);
                    $sex=strtolower($_POST['sex']);
                    $countr=strtolower($_POST['countr']);
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
                    if(!empty($_POST['sex']))
                    {
                        $update=$conn->query("UPDATE user_info SET gender='$sex' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    if(!empty($_POST['countr']))
                    {
                        //$update=$conn->query("UPDATE user_info SET firstname='$fname' WHERE email='".$_SESSION['email']."'")->execute();
                    }
                    //$update=$conn->query("UPDATE user_info SET WHERE email='".$_SESSION['email']."'")->fetchAll();
                }  
            ?>
            <div class="tab-pane fade" id="edit-account">
                <form id="account-form" method="post">
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="firstname" class="grey-text font-weight-light">First Name</label>
                            <input type="text" class="form-control" placeholder="<?php echo ucwords($info['firstname']); ?>" id="firstname" style="background-color:transparent;" name="fname" pattern="[A-Za-z]{1-20}" title="Only letters allowed">
                        </div>
                        <div class="col">
                            <label for="lastname" class="grey-text font-weight-light">Last Name</label>
                            <input type="text" class="form-control" name="surname" placeholder="<?php echo ucwords($info['lastname']); ?>" id="lastname" pattern="[A-Za-z]" title="Only letters allowed">
                        </div>
                    </div>
                     <div class="form-row mb-4">
                        <div class="col">
                            <label for="email" class="grey-text font-weight-light">E-mail</label>
                            <input type="text" class="form-control" placeholder="<?php echo $info['email']; ?>" id="email" readonly>
                        </div>
                        <div class="col">
                            <label for="number" class="grey-text font-weight-light">Phone Number</label>
                            <input type="text" class="form-control" placeholder="<?php echo $info['phone_no']; ?>" id="number" name="num" pattern="[0-9]{11}" title="Only 11 didgits allowed">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="grey-text font-weight-light">Address</label>
                        <input type="text" class="form-control" placeholder="<?php echo ucwords($info['address']); ?>" id="address" name="addres">
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="gender" class="grey-text font-weight-light">Gender</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['gender']); ?>" id="gender" name="sex">
                        </div>
                        <div class="col">
                            <label for="country" class="grey-text font-weight-light">Country</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($info['country']); ?>" id="country" name="countr">
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-warning" style="width:50%; height:40px; margin-left:auto; margin-right:auto;">Update Profile</button>
                </form>
            </div>
            </div>
        <br>
    </body>
</html>
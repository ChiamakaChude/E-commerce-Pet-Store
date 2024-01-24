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
                    
                    $cart=$conn->query("SELECT user_cart.cart_product_id, products.image, products.product_name, products.product_price FROM user_cart INNER JOIN products ON user_cart.cart_product_id=products.product_id WHERE cart_email='".$_SESSION['email']."'")->fetchAll();
        
                    $product_db=$conn->query("SELECT product_id_fk FROM user_likes WHERE email_fk='".$_SESSION['email']."'")->fetchAll();
                    $products = array();
                    foreach($product_db as $row)
                    {
                        $p_id = $row['product_id_fk'];
                        array_push($products, $p_id);
                    }  
            ?>
    </head>
    
    <body onload="<?php //sleep(4);?>" style="background-color:whitesmoke;">
        <?php include 'navbar.php'; ?>
        <div class="container">
        <br>
        <div id="cart-list" class="container-fluid">
            <br>
            <script>
            document.write(window.innerWidth);
        </script>
            <h4 style="font-weight:bold;">My Cart</h4>
            <br>
        <div class="row animated animatedFadeInUp fadeInUp">
        <?php
            $total=0;
            foreach($cart as $key => $row)
                    {
                        $product_id = $row['cart_product_id'];
                        $total=$total+$row["product_price"];
                        if(in_array($product_id,$products))
                            {
                          ?>
                            <div class='card' id="cart-item">
                            <a onclick='delete_item("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><p style="font-size:30;" id="delete-item">&times;</p></a>
                                <?php echo "
                                <img id='prod' class='card-image col-sm-5' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body col-sm-7'>
                                    <h6 class='card-title' id='p-name'>".$row["product_name"]."</h6>
                                    <p>Price: <span style='font-weight:bold;'>&#8358;".number_format($row["product_price"],2)."</span></p>
                                    <span><form method='post'>Quantity: <input type='number'></form></span>
                                </div>
                                <div class='card-footer'><p style='float:right; font-weight:bold;'>SUB-TOTAL &ensp;&ensp; &#8358;".number_format($row["product_price"],2)."</p></div>";?>
                            </div> <br><br>&ensp;
                             <?php   }
                        else
                        { ?>
                            <div class='card' id="cart-item">
                                <a onclick='delete_item("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><p style="font-size:30;" id="delete-item">&times;</p></a>
                                <?php echo "
                                <img id='prod' class='card-image col-sm-5' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body col-sm-7'>
                                    <h6 class='card-title' id='p-name'>".$row["product_name"]."</h6>
                                    <p>Price: <span style='font-weight:bold;'>&#8358;".number_format($row["product_price"],2)."</span></p>
                                    <span><form method='post'>Quantity: <input type='number'></form></span>
                                </div>
                                <div class='card-footer'><p style='float:right; font-weight:bold;'>SUB-TOTAL &ensp;&ensp; &#8358;".number_format($row["product_price"],2)."</p></div>";?>
                                </div><br><br>&ensp;
                       <?php }
                    }
        ?>
        </div>
        </div>
        <script>
                 function delete_item(id, product_id)
                        {
                            window.location.reload(true);
                            if(!<?php echo isset($_SESSION['email'])?'false':'true'; ?>)
                            {
                                //alert("the content "+ id+ " "+product_id);
                                //alert($(this).attr('id'));
                                $.ajax({
                                    type: "POST",
                                    url: 'delete-cart-item.php',
                                    data: "prod_id=" + product_id,
                                    success: function(data)
                                    {
                                        alert("success!"+data);
                                    }
                                });
                            }
                            
                        else
                        {
                            window.alert("You have to log in to add product to cart");  
                        }
                    }

        </script>   
            <?php
            $subtotal=$delivery="";
            $errors=0;
            $price=0;
            $sum=0;
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $subtotal=$_POST['total'];
                $delivery=$_POST['delivery'];
            
                
               // if(isset($_POST['delivery']))
              //  {
                    switch($delivery)
                    {
                        case 'pick':
                            $delivery='Pick Up';
                            $price=0;
                            break;
                        case 'instant':
                            $delivery='Instant';
                            $price=1200;
                            break;
                        case 'standard':
                            $delivery='Standard';
                            $price=600;
                            break;
                    }
                //}
                $sum=$total+$price;
            }
            $count=$conn->query("SELECT COUNT(cart_product_id) FROM `user_cart` WHERE cart_email='".$_SESSION['email']."'")->fetchColumn(); 
        ?>
        <div class="container fixed-right" id="summary">
            <br>
            <form method='post' id="check">
                <p style="font-size:30px;" id="summary-total">TOTAL</p><hr>
                
                SUB-TOTAL(&#8358;): <input type="text" name="total" readonly value="<?php echo number_format($total,2); ?>" id="subtotal"><br id="break"><br id="break">
                
                Delivery Method: <select name="delivery" id="pick_ups" onchange="myoption()">
                <option value="pick" <?php if (isset($_POST['delivery'])&& $_POST['delivery'] == 'pick') { ?>selected="true" <?php }; ?>>Pick Up</option>
                
                <option value="instant"  <?php if (isset($_POST['delivery'])&& $_POST['delivery'] == 'instant') { ?>selected="true" <?php }; ?>>Instant (&#8358;1,200.00)</option>
                
                <option value="standard"  <?php if (isset($_POST['delivery'])&& $_POST['delivery'] == 'standard') { ?>selected="true" <?php }; ?>>Standard(&#8358;)600.00</option>
                
                </select><br id="break"><br id="break">
                TOTAL(&#8358;): <input type="text" value="<?php echo number_format($sum,2); ?>" id="sum-total"><br id="break"><br id="break">
                
                <button type="submit" id="checkout-button" class="btn btn-success" name="checkout" data-toggle="modal" data-target="#checkout-summary" <?php if($count==0){?> disabled="true"  <?php }; ?> >Checkout</button>
            </form>
            <div id="accept">
            <p>We accept:<?php echo $delivery  ; echo $price;?> </p>
               <p style="text-align:center;"><i class="fa fa-cc-paypal fa-2x" style="color:#253b80;"></i>
                <i class="fa fa-cc-visa fa-2x" style="color:#0157a2;"></i>
                <i class="fa fa-cc-mastercard custom fa-2x" style="color:#0a3a82;"></i>
                <i class="fa fa-cc-stripe fa-2x" style="color:#00afe1;"></i>
                </p>
            </div>
            <?php 
            $_SESSION['price']=$price;
            $_SESSION['delivery']=$delivery;
            $_SESSION['total']=$total;
            $_SESSION['sum']=$price+$total;
            if(isset($_SESSION['price'])&& isset($_SESSION['delivery'])&& isset($_SESSION['total'])&&$_SERVER["REQUEST_METHOD"]=="POST")
            {
                echo $_SESSION['price']." ".$_SESSION['delivery']." ".$_SESSION['total'];
                echo "<script>window.location.href='checkout.php';</script>";
            }?>
        </div>
           <!-- <script>
                function myoption(){
                    var pick = $('#pick_ups').val();
                    document.getElementById("price").innerHTML=pick;
                    alert("This is value "+pick) ;
                }
            $('#check').on('submit', function(e){
            $('#checkout-summary').modal('show');
               e.preventDefault();
            });
        </script>-->
        </div>
       
        <div class="modal fade" id="checkout-summary" role="dialog">
            <div class="modal-dialog">
                <br>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>
                <div class="modal-title" style="text-align:center; font-size:20px; font-weight:bold;">SUMMARY</div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">SUB-TOTAL(&#8358;)</div>
                        <div class="col-sm-6"><?php echo number_format($total,2); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" id="deliver">Delivery<?php echo $delivery; ?></div>
                        <div class="col-sm-6" id="price"><?php echo $price; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="font-weight:bold;">TOTAL</div>
                        <div class="col-sm-6"></div>
                    </div>
                    <a href="signout.php" id="signout"><button type="button" name="yes" class="btn btn-primary">Yes</button></a>
                    <button id="signout" type="button" data-dismiss="modal" class="btn btn-primary">No</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
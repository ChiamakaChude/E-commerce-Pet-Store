<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Place your stylesheet here-->
    <link href="pet-app.css" rel="stylesheet">
        <link rel="icon" href="logo1.png">
<?php
session_start();
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="pet_app";

                $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                $cart=$conn->query("SELECT cart_product_id from user_cart WHERE cart_email='".$_SESSION['email']."'")->fetchAll();
                $orderid=0;
                $max=$conn->query("SELECT MAX(order_id) FROM user_order")->fetchColumn();
                $orderid=$max+1;
                echo $orderid;
                    $address=$conn->query("SELECT address FROM user_info WHERE email='".$_SESSION['email']."'")->fetch();
                    echo $address['address'];
        
                    $order=$conn->query("INSERT INTO user_order (order_id, order_email, address, price, payment_method, delivery_method) VALUES ('$orderid', '".$_SESSION['email']."','".$address['address']."','".$_SESSION['sum']."', '".$_SESSION['card-type']."', '".$_SESSION['delivery']."')");
        
                    echo $_SESSION['card-type']."<br>";
                    echo $_SESSION['delivery'];
                    foreach($cart as $key => $row)
                    {
                        echo $row['cart_product_id']."<br>";
                        $orders=$conn->query("INSERT INTO orders(orders_id, orders_product_id) VALUES ('$orderid', '".$row['cart_product_id']."')");
                    }

                    $delete=$conn->query("DELETE FROM user_cart WHERE cart_email='".$_SESSION['email']."'")->execute();

                    echo "<script>alert('Items Purchased sucessfully. Keep in touch with our customer care personnel to track your order. Thanks for shopping with Pet City');</script>";
                    
                    
?>
        
        <title>
            Pet City| Cart
        </title>
    </head>
    <body>
        <div class="modal fade" id="checkout-summary" role="dialog">
            <div class="modal-dialog">
                <br>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    </div>
                <div class="modal-body">
                    <p>Items Purchased sucessfully. Keep in touch with our customer care personnel to track your order. Thanks for shopping with Pet City</p>
                </div>
                </div>
            </div>
        </div>
        <?php
            echo "<script>window.location.href='index.php';</script>";
        ?>
    </body>
</html>
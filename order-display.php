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
            Pet City|Orders
        </title>
        <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="pet_app";

                    $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    if(isset($_SESSION['email'])) {$mail=$_SESSION['email'];}
                    else {$mail="";}
            ?>
    </head>
    
    <body onload="<?php //sleep(2);?>">
        <?php include 'navbar.php'; ?>
        <br>
        <div class="container-fluid" id="order-display">
            <h2 style="text-align:center;">Order Details</h2>
        <?php
            if(isset($_GET['id']))
            {
                $order_id= base64_decode($_GET['id']);
                $order=$conn->query("SELECT orders.orders_id, orders.orders_product_id, user_order.date, user_order.price, user_order.payment_method, user_order.delivery_method FROM orders INNER JOIN user_order ON orders.orders_id=user_order.order_id WHERE orders.orders_id='".$order_id."'")->fetchAll();
                $orders=$conn->query("SELECT delivery_method, payment_method,date,price, address FROM user_order WHERE order_id='".$order_id."'")->fetch();
                $price=0;
                if ($orders['delivery_method']=="Instant")
                {
                    $price=1200;
                }
                elseif($orders['delivery_method']=="Standard")
                {
                    $price=600;
                }
                elseif($orders['delivery_method']=="Pick Up")
                {
                    $price=0;
                }
                $total=$orders['price']-$price;
                 echo "
                        <p><b>Order Number: $order_id </b><br>
                        Ordered on ".$orders['date']."<br>
                        Total: &#8358; ".number_format($orders['price'],2)."</p>
                        <hr>
                        <div class='row'>
                        <div class='col-6'>
                            <p><b>Shipping:</b> ".$orders['delivery_method']."</p>
                            <p><b>Address:</b> ".ucwords($orders['address'])."</p>
                        </div>
                        <div class='col-6'>
                            <h5>Payment</h5>
                            <b>Payment Method: ".$orders['payment_method']."<br>
                            Items Total: &#8358;".number_format($total,2)."<br>
                            Shipping Fee: &#8358;".number_format($price,2)."</p>
                        </div>
                    </div> <hr><br>";
                echo "<h4>Items in your order</h4><br>";
                foreach($order as $row)
                {
                   
                    $product_id=$row['orders_product_id'];
                    $products=$conn->query("SELECT product_name, image, product_price FROM products WHERE product_id='".$product_id."'")->fetchAll();
                    foreach($products as $item)
                    {?>
                        <div class="row"></div>
                        <a href='products_display.php?id=<?php echo $product_id; ?>' id='view'><div class="row" style="width:100%;  border: 1px solid lightgray; border-radius: 6px;" id="order-item">
                                <?php echo "
                                <div class='col-3'>
                                <img id='prod' src='uploads/".$item["image"]."' alt='Card Image'></div>
                                <div class='col-9'>
                                    <h6 class='card-title' id='p-name'>".$item["product_name"]."</h6>
                                    <p><span>&#8358;".number_format($item["product_price"],2)."</span></p>";?>
                                <?php echo "</div>";?>
                            </div></a> &ensp;&ensp;
                   <?php }
                }
            }
        ?>
        </div>
    </body>
</html>
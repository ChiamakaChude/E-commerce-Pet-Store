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
        <title>Pet City|Search Result</title>
        <?php
            $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="pet_app";

                    $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    if(isset($_SESSION['email'])) {$mail=$_SESSION['email'];}
                    else {$mail="";}
        
                    $data=$conn->query("SELECT * FROM products WHERE product_name LIKE '%".$_SESSION['search']."%' OR brand LIKE '%".$_SESSION['search']."%' OR category LIKE '%".$_SESSION['search']."%' OR animal LIKE '".$_SESSION['search']."'")->fetchAll();
                    $product_db=$conn->query("SELECT product_id_fk FROM user_likes WHERE email_fk='".$mail."'")->fetchAll();
                    $products = array();
                    foreach($product_db as $row) 
                    {
                        $p_id = $row['product_id_fk'];
                        array_push($products, $p_id); //puts liked products in array
                    }  
        ?>
    </head>
    <body onload="<?php /*sleep(4);*/ echo "<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>"; ?>">
        <?php include 'navbar.php';?>
        <script>
            document.write(window.innerWidth);
        </script>
        <h4 style="text-align:center;">Search results for "<?php echo $_SESSION['search']; ?>"</h4>
        <div class="container-fluid" id="page-container">
        <div id="products">
        <div class="row" id="row">
        <?php
        foreach($data as $key => $row)
                    {
                        $product_id = $row['product_id'];
                        if(in_array($product_id,$products))
                            {
                          ?>
                            <div class='card'>
                            <i id="<?php echo 'like'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'></i>
                                <?php echo "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,44)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>"?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>";?>
                            </div>&ensp;<br><br><br>
                     <?php   }
                        else
                        {
                            ?>
                            <div class='card'>
                            <i id="<?php echo 'like'.$key ?>" class='fa fa-heart-o' onclick='like("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'></i>
                                <?php echo "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,44)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>"; ?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>";?>
                            </div><br> &ensp; <br><br><br>
                     <?php   }
                        }
        ?>
            </div>
        </div>
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
    </body>
</html>
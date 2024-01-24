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
            Pet City|Home Page
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
                    $product_db=$conn->query("SELECT product_id_fk FROM user_likes WHERE email_fk='".$mail."'")->fetchAll();
                    $products = array();
                    foreach($product_db as $row)
                    {
                        $p_id = $row['product_id_fk'];
                        array_push($products, $p_id);
                    }  
            ?>
    </head>
    
    <body onload="<?php //sleep(3);?>">
        <div class="container-fluid" id="page-container">
        <?php include 'navbar.php'; ?>
        <?php
            if(isset($_GET['animal'])&& isset($_GET['category']))
            {
                $_SESSION['animal']=$_GET['animal'];
                $_SESSION['category']=$_GET['category'];
                echo $_SESSION['animal']."<br>";
                echo $_SESSION['category'];?>
                <div id="products">
                    <div class="row" id="row">
                        <?php $data=$conn->query("SELECT * FROM products WHERE category='".$_SESSION['category']."' AND animal='".$_SESSION['animal']."'")->fetchAll();
                        
                    foreach($data as $key => $row)
                    {
                        $product_id = $row['product_id'];                            if(in_array($product_id,$products))
                            {
                             ?>
                            <div class='card'>
                            <i id="<?php echo 'products'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'products'.$key ?>","<?php echo $product_id ?>")'></i>
                            <?php
                            echo
                                "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,40)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>
                            </div> &ensp;&ensp;";                    
                             
                            }
                            else
                            {?>
                                <div class='card'>
                            <i id="<?php echo 'products'.$key ?>" class='fa fa-heart-o' onclick='like("<?php echo 'products'.$key ?>","<?php echo $product_id ?>")'></i>
                            
                            <?php
                            echo
                                "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,40)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'products'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>
                            </div> &ensp;&ensp;";    
                                        
                                    }
                                }
                }
                            
            if(isset($_GET['nRQLd']))
                {
                    $email=$_SESSION['email'];
                    $e_mail=base64_decode($_GET['nRQLd']);
                    ?>
                    <br><br>
                    <div id="products">
                    <div class="row" id="row">
                        <?php 
                        $data=$conn->query("SELECT user_likes.product_id_fk, products.image, products.product_name, products.product_price, products.old_price FROM user_likes INNER JOIN products ON user_likes.product_id_fk=products.product_id WHERE email_fk='".$e_mail."'")->fetchAll();
                        
                    foreach($data as $key => $row)
                    {
                        $product_id = $row['product_id_fk'];                            if(in_array($product_id,$products))
                            {
                             ?>
                            <div class='card'>
                            <i id="<?php echo 'products'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'products'.$key ?>","<?php echo $product_id ?>")'></i>
                            <?php
                            echo
                                "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,40)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>";?>
                            </div> &ensp;&ensp;                    
                             
                          <?php  }
                            else
                            {?>
                                <div class='card'>
                            <i id="<?php echo 'products'.$key ?>" class='fa fa-heart-o' onclick='like("<?php echo 'products'.$key ?>","<?php echo $product_id ?>")'></i>
                            
                            <?php
                            echo
                                "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,40)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'products'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>";?>
                            </div> &ensp;&ensp;    
                                        
                            <?php        }
                                }
                            ?>
                    </div>
                    </div>
             <?php   }
                
            if (isset($_GET['id']))
            {
                echo $_GET['id'];
                $view=$conn->query("SELECT * FROM products WHERE product_id='".$_GET['id']."'")->fetch();
                ?>
                <div class="container" id="view-container">
                <div id="view-products">
                    <img src="uploads/<?php echo $view['image']; ?>">
                    <h5><?php echo $view['product_name']; ?></h5>
                    <h5>&#8358;<?php echo number_format($view['product_price'],2); ?></h5>
                    <h5 style='color:gray; text-decoration: line-through;
'>&#8358;<?php echo number_format($view['old_price'],2); ?></h5>
                </div>
                <div>
                    <p><b>Delivery Information</b></p>
                    <p><?php $date= date("l, d M Y");
                echo "Get it in Lagos by ".date("l, d M Y",strtotime($date.'+ 2 weekdays'))." for instant shipping, allow 3 extra business days for standard shipping items and 16 extra business days for items shipped from overseas. Allow up to 8 additional business days for other cities"; ?></p>
                </div>
                <div>
                    <p><b>Product Description</b></p>
                    <p><?php echo $view['details']; ?></p>                    
                </div>
                </div>
              <?php                      
            }
                                    
                                    ?>
                
                
                <script>
                 <?php include 'like-unlike.js';
                       include 'cart.js';    
                ?>
                </script>
        </div>
    </body>
</html>
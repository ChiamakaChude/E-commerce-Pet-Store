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
                    $remind=$conn->query("SELECT address FROM user_info WHERE email='".$mail."'")->fetch();
                    function reminder($remind)
                    {
                        if($remind['address']==="")
                        {
                            $message="You are yet to complete your profile!";
                            echo "<script>alert('$message');</script>";
                        }
                    }   
               /* echo " <script>
            window.setInterval(set,5000);
            function set()
            {
                document.write(".reminder($remind).");
            }
        </script>";*/
            ?>
    </head>
    
    <body onload="<?php //sleep(2);?>">
        <?php include 'navbar.php'; ?><!-- display Navbar -->
       <!-- Display pictures in carousel -->
            <div class="carousel slide" id="discounts" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img src="discount/pet-discount10.png"></div>
                    <div class="carousel-item"><img src="discount/pet-discount9.png"></div>
                    <div class="carousel-item"><img src="discount/pet-discount8.png"></div>
                    <div class="carousel-item"><img src="discount/royal-canin-ad.png"></div>
                    <div class="carousel-item"><img src="discount/pet-discount7.png"></div>
                    <div class="carousel-item"><img src="discount/pet-discount.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount1.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount2.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount3.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount4.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount5.jpg"></div>
                    <div class="carousel-item"><img src="discount/pet-discount6.jpg"></div>
                </div>
                <a class="carousel-control-prev" href="#discounts" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                 <a class="carousel-control-next" href="#discounts" data-slide="next"><span class="carousel-control-next-icon"></span></a>
            </div>
            <br><br>
       
        <div class="container-fluid" id="page-container">
            <!-- display New Products -->
            <div id="products">
                <hr><h5>New Arrivals</h5>
                <div class="row" id="row">
                    <?php $data=$conn->query('SELECT * FROM products ORDER BY date_entered desc LIMIT 5')->fetchAll();
                    foreach($data as $key => $row)
                    {
                        $product_id = $row['product_id']; //put liked product id in variables
                        if(in_array($product_id,$products)) //check if liked products exist in products table
                            { //display liked products
                          ?>
                           <div class='card'>
                            <i id="<?php echo 'like'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'></i>
                                <?php echo "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,44)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                <?php echo "</div>";?>
                               </div> &ensp;&ensp;
                             <?php   }
                        else //diaplay unliked products
                        { ?>
                            <div class='card'>
                            <i id="<?php echo 'like'.$key ?>" class='fa fa-heart-o' onclick='like("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'></i>
                                <?php echo "<a href='products_display.php?id=$product_id' id='view'>
                                <img id='prod' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name'>".substr($row["product_name"],0,44)."...</h6>
                                    <p><span>&#8358;".number_format($row["product_price"],2)."</span>
                                    <span style='color:gray; text-decoration: line-through;
'><br>&#8358;".number_format($row["old_price"],2)."</span></p></a>";?>
                                    <button type='button' class='btn' id='add' onclick='cart("<?php echo 'like'.$key ?>", "<?php echo $product_id ?>")'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                               <?php echo "</div>";?>
                                </div> &ensp;&ensp;
                       <?php }
                    }
                    ?> 
                        <br><br>
                </div>
            </div>
            <br>
             
            <!-- display Lattest Sold Products -->
            <div id="products">
                <hr><h5>Latest Sales</h5>
                <div class="row" id="row">
                        
                    <?php $data=$conn->query('SELECT * FROM products ORDER BY quantity asc LIMIT 5')->fetchAll();
                  
                    foreach($data as $key => $row)
                    {
                        $product_id = $row['product_id']; //put liked product id in variables
                        
                            if(in_array($product_id,$products))//check if liked products exist in products table
                            {       //display liked products                 
                             ?>
                            <div class='card'>
                            <i id="<?php echo 'latest'.$key ?>" class='fa fa-heart' onclick='like("<?php echo 'latest'.$key ?>","<?php echo $product_id ?>")'></i>
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
                                <?php echo "</div>"; ?>
                            </div> &ensp;&ensp;                   
                             
                           <?php }
                            else{//display unliked products
                            ?>
                            <div class='card'>
                            <i id="<?php echo 'latest'.$key ?>" class='fa fa-heart-o' onclick='like("<?php echo 'latest'.$key ?>","<?php echo $product_id ?>")'></i>
                            <img onload='already_liked("<?php echo 'latest'.$key ?>","<?php echo $product_id ?>")'>
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
                    }
                            ?> 
                </div>
                </div>       
        <br>    
            <!-- display Articles -->
            <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjkgOLur_XiAhU68uAKHViZAxIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.dogstrust.org.uk%2Fnews-events%2Fnews%2Fdogs-trust-and-animal-welfare-organisations-unite-to-protect-the-public-from-dodgy-pet-sellers&psig=AOvVaw2yZN8uvSmNPfN1qrHxiLdz&ust=1561027747100932"><img src="articles/article-how-to-buy-pets.jpg"></a>
                    <div class="caption">
                        <p id="article">Some of the greatest moments in life include the day we met our pets for the first time, and the day we adopted them and they came home with us.</p>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjVtp31sPXiAhWD3OAKHaUdCeIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.castleveterinarygroup.co.uk%2Fpet-passport-travel-information%2F&psig=AOvVaw2c1W2Q8PeFWsRM10NSMbIU&ust=1561028061970280"><img src="articles/article-travelling-with-a-pet.jpg"></a>
                    <div class="caption">
                        <p id="article">Family vacations are no longer just for two-legged children.If you’re looking to hit the road or fly the skies with your canine companion or feline friend, we’ve got tips to make the trip as smooth as possible.</p>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjY3ITWsfXiAhUdBWMBHc3xCUwQjxx6BAgBEAI&url=https%3A%2F%2Fpuppyintraining.com%2Fhow-to-potty-train-a-puppy%2F&psig=AOvVaw3ZLysO0Bc-cXNMWD8QVROB&ust=1561028267345065"><img src="articles/article-potty-training.jpg"></a>
                    <div class="caption">
                        <p id="article">House training your puppy is about consistency, patience, and positive reinforcement. The goal is to instill good habits and build a loving bond with your pet.</p>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjonaW59fXiAhXSDGMBHaQvDPIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.lambertvetsupply.com%2Fwell-pet-post.html&psig=AOvVaw0X_HQ99M7OdBxXVGUOigMt&ust=1561046452594230"><img src="articles/article-dog-vaccines.png"></a>
                    <div class="caption">
                        <p id="article">Only you and your dog’s vet can decide what vaccinations are necessary for your dog. No one wants to put their dog through discomfort, and the vaccination schedule seems endless. You may question whether all of these vaccinations are really necessary.</p>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-5">
                <div class="thumbnail">
                    <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwj2x7q_9vXiAhXlg-AKHSz-BgYQjxx6BAgBEAI&url=https%3A%2F%2Fwww.petsafe.net%2Flearn%2Fhelp-prevent-animal-cruelty&psig=AOvVaw0ZcWsoAN8ucSD1sTvS5bQ6&ust=1561046614732579"><img src="articles/article-animal-cruelty.jpg"></a>
                    <div class="caption">
                        <p id="article">Animal cruelty includes intentional, malicious acts of harm and less clear-cut situations where the needs of an animal are neglected. Violence against animals has been linked to a higher likelihood of criminal violence and domestic abuse. No way to live</p>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-7">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjT2eX99vXiAhUEd98KHdypAHEQjxx6BAgBEAI&url=https%3A%2F%2Fwww.k9ofmine.com%2Fbest-dogs-for-depression%2F&psig=AOvVaw2QOgq6g84_oZjO7Sv_XYTv&ust=1561046841698602"><img src="articles/article-dog-depression.jpg"></a>
                    <div class="caption">
                        <p id="article">From depression to bipolar disorder to PTSD, mental illness can be serious and all-consuming. There are plenty of clinical ways to help with mental disorders, but it turns out your pet can play a role in your recovery, too. Here are the best (and most surprising) dog breeds that can help with your illness.</p>
                    </div>
                    </div><br>
            </div>
        </div>
        <br>
            
            <!-- display Brands -->
            <div id="products">
                <hr><h5>Popular Brands</h5>
                <div class="row" id="row">
                        
                        <?php $data=$conn->query("SELECT image, brand FROM products WHERE NOT brand='' AND category LIKE '%food%' GROUP BY brand desc limit 5")->fetchAll();
                    foreach($data as $key => $row)
                    {
                        ?>
                            <?php
                            echo
                                "<div class='card'>
                                <img id='brands' class='card-image-top' src='uploads/".$row["image"]."' alt='Card Image'>
                                <div class='card-body'>
                                    <h6 class='card-title' id='p-name' style='text-align:center; font-size:18px;'>".ucwords($row["brand"])."</h6>
                                </div>
                                </div> &ensp;&ensp;";
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
                </script> <br>
             <img src="pet-insurance.jpg" id="insurance">
        <!-- Footer -->
        <footer class="page-footer">
            <div class="row">
                <div class="col-sm-6">
                    <p>How can we help you?</p>
                    <h7>Customer care line: 01-323724 or 01-365921</h7>
                </div>
                <div class="col-sm-6">
                    <h5>Languages</h5>
                    <p>English<br>French<br>Spanish</p> 
                </div>
            </div>
            <div id="contact">
                <p>Contact Us</p>
                <button><a id="facebook" href="https://www.facebook.com/chiamakachude"><i class="fa fa-facebook fa-2x"  aria-hidden="true"></i></a></button>
                <button><a id="twitter" href="https://twitter.com/chiamakachude"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></button>
                <button><a id="googleplus"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a></button>
                <button><a id="instagram" href="https://instagram.com/maraji_"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></button>
                <button><a id="pinterest" href="https://pinterest.com/chiamakachude/"><i class="fa fa-pinterest fa-2x" aria-hidden="true"></i></a></button>
            </div>
            <br>
            <div class="footer-copyright text-center py-3" id="copy">© 2019 Copyright
            </div>
        </footer>
    </body>
</html>
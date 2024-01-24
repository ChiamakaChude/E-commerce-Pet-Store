<?php
session_start();            


                $cart_email_id= $_SESSION['email'];
                $cart_product_id = $_POST['prod_id'];
                //echo "it is here ".$_POST['prod_id']." ".$_SESSION['email']."<br>".$cart_product_id." ".$cart_email_id;
                echo "One product has been added to your cart";
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="pet_app";

                $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $data=$conn->query("INSERT INTO user_cart VALUES ('$cart_email_id', '$cart_product_id') ");
                
?>
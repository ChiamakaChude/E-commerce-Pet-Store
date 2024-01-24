<?php
session_start();            


                //echo "it is here ".$_POST['prod_id']; exit;
                $mail= $_SESSION['email'];
                $pid = $_POST['prod_id'];
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="pet_app";

                $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $data=$conn->query("INSERT INTO user_likes VALUES('$mail','$pid')");
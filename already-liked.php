<?php
session_start();
     echo "it is here ".$_POST['prod_id']; exit;
     $pid = $_POST['prod_id'];
     $servername="localhost";
     $username="root";
     $password="";
     $dbname="pet_app";

     $conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $product=$conn->query("SELECT product_id_fk FROM user_likes WHERE email_fk='$email'")->fetchAll();
     $pid = $_POST['prod_id'];
     foreach ($product as $row)
     {
        if ($row['product_id_fk']==$pid)
        {
            echo "product exists";
        }
    }
?>
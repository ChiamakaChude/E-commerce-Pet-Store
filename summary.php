<!DOCTYPE>
<?php session_start(); ?>
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
                    
                    /*$cart=$conn->query("SELECT user_cart.cart_product_id, products.image, products.product_name, products.product_price FROM user_cart INNER JOIN products ON user_cart.cart_product_id=products.product_id WHERE cart_email='".$_SESSION['email']."'")->fetchAll();
        
                    $product_db=$conn->query("SELECT product_id_fk FROM user_likes WHERE email_fk='".$_SESSION['email']."'")->fetchAll();
                    $products = array();
                    foreach($product_db as $row)
                    {
                        $p_id = $row['product_id_fk'];
                        array_push($products, $p_id);
                    }  */
            ?>
    </head>
<body>
    <nav class="navbar-nav fixed-top" style="width:100%; height:60px; background-color:skyblue;">
        <div id="pets">
        <ul class="navbar-nav mr-auto w-100">
            <li class="nav-item"> 
                <h3 style="color:white; text-align:center;">Payment</h3></li>
            </ul>
        </div>
    </nav>
    <div class="container" id="pay">
                    <br><br><br><br>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $card_type=$bank=$expdate="";
                $cardno=0; $cvv=0; $errors=0;
                function encode($data)
                {
                    $data=base64_encode($data);
                    return $data;
                }
                
                $card_type=$_POST['card-type'];
                $bank=encode($_POST['bank']);
                switch($bank)
                {
                    case "access nig":
                        $bank="Access Bank Nigeria PLC";
                        break;
                    case "access gha":
                        $bank="Access Bank Ghana PLC";
                        break;
                    case "addis":
                        $bank="Addis International Bank Ethiopia";
                        break;
                    case "albaraka":
                        $bank="Al Baraka Bank Of Egypt";
                        break;
                    case "arab":
                        $bank="Arab Gambian Islamic Bank";
                        break;
                    case "atlantic":
                        $bank="Atlantic Bank Cameroon";
                        break;
                    case "almaghrib":
                        $bank="Bank Al-Maghrib Morocco";
                        break;
                    case "atlantictogo":
                        $bank="Banque Atlantique Togo";
                        break;
                    case "d'algerie":
                        $bank="Banque exterieure d'Algerie";
                        break;
                    case "islamicsenegal":
                        $bank="Banque Islamique du Senegal";
                        break;
                    case "barclaysghana":
                        $bank="Barclays Bank of Ghana";
                        break;
                    case "barclayskenya":
                        $bank="Barclays Bank of Kenya";
                        break;
                    case "capitec":
                        $bank="Capitec Bank of South Africa Limited";
                        break;
                    case "citibank":
                        $bank="Citibank Senegal";
                        break;
                    case "dashen":
                        $bank="Dashen Bank Ethiopia";
                        break;
                    case "diamond":
                        $bank="Diamond Trust Bank Kenya";
                        break;
                    case "fidelitynig":
                        $bank="Fidelity Bank Nigeria PLC";
                        break;
                    case "fidelitynig":
                        $bank="Fidelity Bank Ghana PLC";
                        break;
                    case "firstnig":
                        $bank="First Bank Of Nigeria Limited";
                        break;
                    case "firstzim":
                        $bank="First Capital Bank Limited Zimbabwe";
                        break;
                    case "gtnig":
                        $bank="Guarantee Trust Bank Nigeria PLC";
                        break;
                    case "gtgha":
                        $bank="Guarantee Trust Bank Ghana PLC";
                        break;
                    case "procredit":
                        $bank="Procredit Bank Congo";
                        break;
                    case "skye":
                        $bank="Skye Bank Gambia";
                        break;
                    case "stanbicnig":
                        $bank="Stanbic IBTC Bank Nigeria PLC";
                        break;
                    case "stanbiczim":
                        $bank="Stanbic Bank Zimbabwe PLC";
                        break;
                    case "standardcongo":
                        $bank="Standard Bank Congo";
                        break;
                    case "standardsa":
                        $bank="Standard Bank of South Africa Limited";
                        break;
                    case "trustalgeria":
                        $bank="Trust Bank Algeria";
                        break;
                    case "unioncameroon":
                        $bank="Union Bank Of Cameroon<";
                        break;
                    case "unionegypt":
                        $bank="Union National Bank Egypt";
                        break;
                    case "uniontogo":
                        $bank="Union Togolaise de Banque";
                        break;
                    case "uba":
                        $bank="United Bank For Africa PLC";
                        break;
                    case "zenith":
                        $bank="Zenith Bank Nigeria PLC";
                        break;
                }
                
                switch($card_type)
                {
                    case "select":
                        
                        $errors++;
                        break;
                    case "master":
                        $card_type="Master Card";
                        break;
                    case "paypal":
                        $card_type="Paypal";
                        break;
                    case "stripe":
                        $card_type="Stripe";
                        break;
                    case "visa":
                        $card_type="Visa Card";
                        break;
                }
                
                
                $cardno=encode($_POST['cardno']);
                $expdate=encode($_POST['expdate']);
                $cvv=encode($_POST['cvv']);
                echo $bank.".....";
                $_SESSION['card-type']=$card_type;
            }
        ?>
        <div id="payment-div">
            <?php 
        echo $_SESSION['sum'];
            ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="bank" class="grey-text font-weight-light">Bank</label>
                            <select class="form-control" id="bank" name="bank" required>
                            <option value="">Select Bank</option>
                            <option value="access nig">Access Bank Nigeria PLC</option>
                            <option value="access gha">Access Bank Ghana PLC</option>
                            <option value="addis">Addis International Bank Ethiopia</option>
                            <option value="albaraka">Al Baraka Bank Of Egypt</option>
                            <option value="arab">Arab Gambian Islamic Bank</option>
                            <option value="atlantic">Atlantic Bank Cameroon</option>
                            <option value="almaghrib">Bank Al-Maghrib Morocco</option>
                            <option value="atlantictogo">Banque Atlantique Togo</option>
                            <option value="d'algerie">Banque exterieure d'Algerie</option>
                            <option value="islamicsenegal">Banque Islamique du Senegal</option>
                            <option value="barclaysghana">Barclays Bank of Ghana</option>
                            <option value="barclayskenya">Barclays Bank of Kenya</option>
                            <option value="capitec">Capitec Bank of South Africa Limited</option>
                            <option value="citibank">Citibank Senegal</option>
                            <option value="dashen">Dashen Bank Ethiopia</option>
                            <option value="diamond">Diamond Trust Bank Kenya</option>
                            <option value="fidelitynig">Fidelity Bank Nigeria PLC</option>
                            <option value="fidelitygha">Fidelity Bank Ghana Limited</option>
                            <option value="firstnig">First Bank Of Nigeria Limited</option>
                            <option value="firstzim">First Capital Bank Limited Zimbabwe</option>
                            <option value="gtnig">Guarantee Trust Bank Nigeria PLC</option>
                            <option value="gtgha">Guarantee Trust Bank Ghana PLC</option>
                            <option value="procredit">Procredit Bank Congo</option>
                            <option value="skye">Skye Bank Gambia</option>
                            <option value="stanbicnig">Stanbic IBTC Bank Nigeria PLC</option>
                            <option value="stanbiczim">Stanbic Bank Zimbabwe PLC</option>
                            <option value="standardcongo">Standard Bank Congo</option>
                            <option value="standardsa">Standard Bank of South Africa Limited</option>
                            <option value="trustalgeria">Trust Bank Algeria</option>
                            <option value="unioncameroon">Union Bank Of Cameroon</option>
                            <option value="unionegypt">Union National Bank Egypt</option>
                            <option value="uniontogo">Union Togolaise de Banque</option>
                            <option value="uba">United Bank For Africa PLC</option>
                            <option value="zenith">Zenith Bank Nigeria PLC</option>
                            </select>
                        </div><br>
                        <div class="form-group">    
                            <label for="card-type" class="grey-text font-weight-light">Card Type &ensp; 
                            <span style="float:right; right:0px;">
                                <i class="fa fa-cc-paypal fa-2x" style="color:#253b80;"></i>&ensp;<i class="fa fa-cc-visa fa-2x" style="color:#0157a2;"></i>&ensp;
                                <i class="fa fa-cc-mastercard custom fa-2x" style="color:#0a3a82;"></i>&ensp;
                                <i class="fa fa-cc-stripe fa-2x" style="color:#00afe1;"></i></span></label>
                            <select class="form-control" id="card-type" name="card-type" required>
                            <option value="">Select Card Type</option>
                            <option value="master">Master Card</option>
                            <option value="paypal">Paypal</option>
                            <option value="stripe">Stripe</option>
                            <option value="visa">Visa Card</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label>Card Number </label> <input type="tel" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" class="form-control cc-number" id="cardno" name="cardno" required>
                        </div><br>
                        <div class="form-inline">
                            <label for="exp">Expiry Date </label> <input type="month" maxlength="7" placeholder="MM/YYYY" class="form-control" id="exp" name="expdate"><br>
                            &emsp;<label for="cvv">CVV </label> <input type="tel" maxlength="3" placeholder="xxx" class="form-control" id="cvv" name="cvv" pattern="[0-9]{3}" title="Fill in the 3 digits at the back of your card" required>
                        </div><br>
                        <button type="submit" class="btn btn-success" style="width:60%; margin-left:auto; margin-right:auto;" name="pay"><i class="fa fa-lock"></i> Pay Now</button>
                    </form>&ensp;&ensp;
            <?php
                if(isset($_SESSION['card-type'])&&$_SERVER["REQUEST_METHOD"]=="POST")
                {
                    echo "<script>window.location.href='success.php';</script>";
                }
            ?>
            </div>
        <div class="carousel slide" id="addv" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active"><a href="https://peterpup.com/natural-dog-care-how-to-give-your-dog-a-longer-life"><img src="articles/article-give-your-dog-longer-life.jpg"></a></div>
                    <div class="carousel-item"><a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwii2_qcy6zjAhVGA2MBHfpdAywQjhx6BAgBEAM&url=https%3A%2F%2Fwww.pinterest.com%2Fchrisu57%2Fcoca-cola-side-of-life%2F&psig=AOvVaw3m9-ljqsQSDrLf0PnDc82n&ust=1562923978081731"><img src="articles/article-cocacola.jpg"></a></div>
                    <div class="carousel-item"><a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwii2_qcy6zjAhVGA2MBHfpdAywQjhx6BAgBEAM&url=https%3A%2F%2Fwww.pinterest.com%2Fchrisu57%2Fcoca-cola-side-of-life%2F&psig=AOvVaw3m9-ljqsQSDrLf0PnDc82n&ust=1562923978081731"><img src="articles/article-scholarship.jpg"></a></div>
                    <div class="carousel-item"><a href="http://weirdscholarships.net/"><img src="articles/article-oxford.jpg"></a></div>
                    
                </div>
            
        </div>
        </div><br><br>
</body>
</html>
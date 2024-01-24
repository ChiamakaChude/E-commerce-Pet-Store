<!DOCTYPE html>
<?php
    $search="";
    function test($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['search']))
    {
        $search=test($_POST["search"]);
        if(empty($_POST['search']))
        {
            $message="You cant search for a null product";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
        else
        {
            $_SESSION['search']=$search;
            echo "<script>window.location.href='search-result.php';</script>";
        }
    }
?>
<nav class="fixed-top">
    <nav class="navbar navbar-expand-md flex-nowrap navbar-new-top" id="nav1">
            <ul class="nav navbar-nav" id="nav1ul">
                <li><a id="fb" href="https://www.facebook.com/chiamakachude"><i class="fa fa-facebook"  aria-hidden="true"></i></a></li>
                <li><a id="twttr" href="https://twitter.com/chiamakachude"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a id="gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a id="ig" href="https://instagram.com/maraji_"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a id="pin" href="https://pinterest.com/chiamakachude/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            </ul>
           
            <ul class="nav navbar-nav mr-auto"></ul>
            <ul class="navbar-nav flex-row">
                <li class="form-group has-search" id="search">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                    <input type="search" placeholder="Search.." name="search">
                    <button type="submit" id="search-btn" name="submit"><i class="fa fa-search fa-lg"></i></button>
                    </form>
                </li>
                <li class="nav-item" id="sign"><a href="signin.php"><p>Login</p></a></li>
                <li style="color:white" id="bar">|</li>
                <li class="nav-item" id="sign"><a href="signup.php"><p>Register</p></a></li>
            </ul>
    </nav>
        
        
    <nav class="navbar navbar-expand-md  navbar-new-bottom" id="nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#pets" aria-controls="nav-collapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars fa-lg"></i></button>
        <a href="" class="navbar-brand"><img src="logo1.png" alt="Logo" id="logo"></a>

        <div class="collapse navbar-collapse" id="pets">
        <ul class="navbar-nav mr-auto w-100">
            <li class="nav-item active"><a class="nav-link" data-toggle="tootlip" data-placement="bottom" title="Home" href="index.php"><i class="fa fa-home fa-lg"><span class="sr-only">current</span></i></a></li>
                
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" id="link">Dogs</a>
                <div class="dropdown-menu">
                    <a href="products_display.php?animal=dog&category=dry food" class="dropdown-item">Dry food</a>
                    <a href="products_display.php?animal=dog&category=wet food" class="dropdown-item">Wet food</a>
                    <a href="products_display.php?animal=dog&category=collars and leashes" class="dropdown-item">Collars & leashes</a>
                    <a href="products_display.php?animal=dog&category=bowls and feeders" class="dropdown-item">Bowls & feeers</a>
                    <a href="products_display.php?animal=dog&category=grooming" class="dropdown-item">Grooming</a>
                    <a href="products_display.php?animal=dog&category=toys" class="dropdown-item">Toys</a>
                    <a href="products_display.php?animal=dog&category=cages and crates" class="dropdown-item">Cages & crates</a>
                    <a href="products_display.php?animal=dog&category=supplements" class="dropdown-item">Supplements</a>
                </div>
            </li>
                
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" id="link">Cats</a>
                <div class="dropdown-menu">
                    <a href="products_display.php?animal=cat&category=dry food" class="dropdown-item">Dry food</a>
                    <a href="products_display.php?animal=cat&category=wet food" class="dropdown-item">Wet food</a>
                    <a href="products_display.php?animal=cat&category=collars and leashes" class="dropdown-item">Collars & leashes</a>
                    <a href="products_display.php?animal=cat&category=bowls and feeders" class="dropdown-item">Bowls & feeers</a>
                    <a href="products_display.php?animal=cat&category=litter boxes" class="dropdown-item">Litter Boxes</a>
                    <a href="products_display.php?animal=cat&category=grooming" class="dropdown-item">Grooming</a>
                    <a href="products_display.php?animal=cat&category=toys" class="dropdown-item">Toys</a>
                    <a href="products_display.php?animal=cat&category=cages and crates" class="dropdown-item">Cages & crates</a>
                    <a href="products_display.php?animal=cat&category=supplements" class="dropdown-item">Supplements</a>
                </div>
                </li>
               
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" id="link">Hamsters</a>
                    <div class="dropdown-menu">
                    <a href="products_display.php?animal=hamster&category=dry food" class="dropdown-item">Dry food</a>
                    <a href="products_display.php?animal=hamster&category=wet food" class="dropdown-item">Wet food</a>
                    <a href="products_display.php?animal=hamster&category=collars and leashes" class="dropdown-item">Collars & leashes</a>
                    <a href="products_display.php?animal=hamster&category=bowls and feeders" class="dropdown-item">Bowls & feeers</a>
                    <a href="products_display.php?animal=hamster&category=grooming" class="dropdown-item">Grooming</a>
                    <a href="products_display.php?animal=hamster&category=toys" class="dropdown-item">Toys</a>
                    <a href="products_display.php?animal=hamster&category=cages and crates" class="dropdown-item">Cages & crates</a>
                    <a href="products_display.php?animal=hamster&category=supplements" class="dropdown-item">Supplements</a>
                    </div>
            </li>
                
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" id="link">Birds</a>
                <div class="dropdown-menu">
                    <a href="products_display.php?animal=bird&category=grains" class="dropdown-item">Grains</a>
                    <a href="products_display.php?animal=bird&category=bowls and feeders" class="dropdown-item">Bowls & feeers</a>
                    <a href="products_display.php?animal=bird&category=grooming" class="dropdown-item">Grooming</a>
                    <a href="products_display.php?animal=bird&category=toys" class="dropdown-item">Toys</a>
                    <a href="products_display.php?animal=bird&category=cages and crates" class="dropdown-item">Cages & crates</a>
                    <a href="products_display.php?animal=bird&category=supplements" class="dropdown-item">Supplements</a>
                </div>
            </li>
            <li><a href="find_a_vet.php">Find a Vet</a></li>
                
                           
            <ul class="nav navbar-nav mr-auto"> </ul>
            <?php 
                if (isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]===true)
            {
                echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" data-placement="bottom" title="Profile" id="end"><i class="fa fa-user fa-lg"></i></a>
                <div class="dropdown-menu">
                    <a href="profile.php" class="dropdown-item">Account</a>
                    <a href="products_display.php?nRQLd='.base64_encode($_SESSION['email']).'" class="dropdown-item">Wishlist</a>
                    <a href="signout.php" class="dropdown-item">Log Out</a>
                    <a href="#" class="dropdown-item">Settings</a>
                </div>
            </li>';
            
            $count=$conn->query("SELECT COUNT(cart_product_id) FROM `user_cart` WHERE cart_email='".$_SESSION['email']."'")->fetchColumn(); 
            echo '<li class="nav-item"><a class="nav-link" data-toggle="tootlip" data-placement="bottom" title="Cart" href="cart.php" id="end"><i class="fa fa-shopping-cart fa-lg" style="font-size:27px;"></i><span class="badge badge-notify" style="font-size:10px;">'.$count.'</span></a></li>';  
            }
            ?>
            </ul>
        </div> 
    </nav>
</nav>
<br><br><br>
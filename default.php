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
       <script>
            function openNav() 
            {
                document.getElementById("side").style.width = "240px";
            }

            /* Set the width of the side navigation to 0 */
            function closeNav() 
            {
                document.getElementById("side").style.width = "0";
            }
        </script>
    <!-- Place your stylesheet here-->
    <link href="pet-app.css" rel="stylesheet">
        <title>
            Royal Pet Stores|Profile
        </title>
    </head>
    
    <body id="bod">
        <nav class="navbar navbar-expand-md fixed-top">
            <div id="side" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <br><br><br>
                 <ul>
                <div>
                <li><a href="#pets" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Pets</a></li>
                    <ul class="collapse" id="pets">
                        <li><a href="#" >Dogs</a></li>
                        <li><a href="#" >Cats</a></li>
                        <li><a href="#" >Hamsters</a></li>
                        <li><a href="#" >Birds</a></li>
                    </ul>
                
                </div>
                <div>
                <li><a href="#food" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Food & Nutrition</a></li>
                    <ul class="collapse" id="food">
                        <li><a href="#" >Dry food</a></li>
                        <li><a href="#" >Wet food</a></li>
                        <li><a href="#">Supplements</a></li>
                    </ul>
                
               </div>
                <div>
                <li><a href="#accessories" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false">Accessories</a></li>
                    <ul class="collapse" id="accessories">
                        <li><a href="#" class="dropdown-item">Collars & leashes</a></li>
                        <li><a href="#" class="dropdown-item">Bowls & feeers</a></li>
                        <li><a href="#" class="dropdown-item">Grooming</a></li>
                        <li><a href="#" class="dropdown-item">Toys</a></li>
                        <li><a href="#" class="dropdown-item">Cages & crates</a></li>
                    </ul>
                </div>
                <li><a href="find_a_vet.php">Find a Vet</a></li>
                </ul>
                </div>
            <span onclick="openNav()" id="open" class="icon"><i class="fa fa-bars fa-lg"></i></span>
            &ensp;&ensp;
            <a href="#" class="navbar-brand"><img src="logo1.png" alt="Logo" id="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse" aria-controls="nav-collapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars fa-lg"></i></button>
            <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" data-toggle="tootlip" data-placement="bottom" title="Home" href="index.php"><i class="fa fa-home fa-lg"><span class="sr-only">current</span></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tootlip" data-placement="bottom" title="Likes" href=""><i class="fa fa-heart fa-lg"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tootlip" data-placement="bottom" title="Profile" href="profile.php"><i class="fa fa-user fa-lg"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="">About</a></li>
            </ul>
            </div>
        </nav>
        <div class="form-group has-search" id="search">
            <input type="search" placeholder="Search..">
            <button type="submit" id="search-btn"><i class="fa fa-search fa-lg"></i></button>
            </div>
            <br><br>
        <footer class="page-footer">
                    <div class="row">
                        <div class="col-xl-4">
                            <p>How can we help you?</p>
                        </div>
                        <div class="col-xl-4">
                            <p>Contact Us</p>
                        </div>
                        <div class="col-xl-4">
                            <h5>Languages</h5>
                            <p>English<br>French<br>Polish<br>Igbo<br>Yoruba<br>Hausa</p>
                        </div>
                    </div>
                    <div class="footer-copyright text-center py-3" id="copy">© 2019 Copyright
                    </div>
                </footer>
    </body>
</html>
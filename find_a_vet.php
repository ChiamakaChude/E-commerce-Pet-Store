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
            Pet City|Find A Vet
        </title>
    </head>
    
    <body id="bod">
        <div class="container-fluid">
        <?php include 'navbar.php'; ?>
        <div class="form-group has-search" id="search">
            <br>
            <input type="search" placeholder="Enter your location..">
            <button type="submit" id="search-btn"><i class="fa fa-search fa-lg"></i></button>
            </div>
        <br><br>

        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://www.bitgeeks.net"></a>
            </div>
            <style>
                .mapouter
                {
                    position:relative;
                    text-align:right;
                    height:500px;
                    width:80%;
                }
                .gmap_canvas
                {
                    overflow:hidden;
                    background:none!important;
                    height:500px;
                    width:80%;
                }
            </style>
        </div>
            <br><br>
        
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail" style="border: 1px solid grey; padding: 5px 5px 5px 5px;">
                    <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjkgOLur_XiAhU68uAKHViZAxIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.dogstrust.org.uk%2Fnews-events%2Fnews%2Fdogs-trust-and-animal-welfare-organisations-unite-to-protect-the-public-from-dodgy-pet-sellers&psig=AOvVaw2yZN8uvSmNPfN1qrHxiLdz&ust=1561027747100932"><img src="article-how-to-buy-pets.jpg"></a>
                    <div class="caption">
                        <h4>Things to know before buying a pet</h4>
                    </div>
                    </div><br>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjVtp31sPXiAhWD3OAKHaUdCeIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.castleveterinarygroup.co.uk%2Fpet-passport-travel-information%2F&psig=AOvVaw2c1W2Q8PeFWsRM10NSMbIU&ust=1561028061970280"><img src="article-travelling-with-a-pet.jpg"></a>
                    </div><br>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjY3ITWsfXiAhUdBWMBHc3xCUwQjxx6BAgBEAI&url=https%3A%2F%2Fpuppyintraining.com%2Fhow-to-potty-train-a-puppy%2F&psig=AOvVaw3ZLysO0Bc-cXNMWD8QVROB&ust=1561028267345065"><img src="article-potty-training.jpg"></a>
                    </div><br>
            </div>
            </div><br>
            <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjonaW59fXiAhXSDGMBHaQvDPIQjxx6BAgBEAI&url=https%3A%2F%2Fwww.lambertvetsupply.com%2Fwell-pet-post.html&psig=AOvVaw0X_HQ99M7OdBxXVGUOigMt&ust=1561046452594230"><img src="article-dog-vaccines.png"></a>
                    </div><br>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwj2x7q_9vXiAhXlg-AKHSz-BgYQjxx6BAgBEAI&url=https%3A%2F%2Fwww.petsafe.net%2Flearn%2Fhelp-prevent-animal-cruelty&psig=AOvVaw0ZcWsoAN8ucSD1sTvS5bQ6&ust=1561046614732579"><img src="article-animal-cruelty.jpg"></a>
                    </div><br>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjT2eX99vXiAhUEd98KHdypAHEQjxx6BAgBEAI&url=https%3A%2F%2Fwww.k9ofmine.com%2Fbest-dogs-for-depression%2F&psig=AOvVaw2QOgq6g84_oZjO7Sv_XYTv&ust=1561046841698602"><img src="article-dog-depression.jpg"></a>
                    </div><br>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                        <a href="https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwi07N3j9_XiAhVkh-AKHWOrC34Qjxx6BAgBEAI&url=https%3A%2F%2Floveourcat.com%2Fcat-articles&psig=AOvVaw0sOc4t-C6QDCTbIRjxwwOX&ust=1561047030813286"><img src="article-cat.jpg"></a>
                    </div><br>
            </div>
        </div>
        <script>
            $(function () {
$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
        </script>
        
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
            <br><br>
        </div>
    </body>
</html>
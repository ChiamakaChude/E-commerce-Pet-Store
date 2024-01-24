                        function cart(id, product_id)
                        {
                            window.location.reload(true);
                            if(!<?php echo isset($_SESSION['email'])?'false':'true'; ?>)
                            {
                                //alert("the content "+ id+ " "+product_id);
                                //alert($(this).attr('id'));
                                $.ajax({
                                    type: "POST",
                                    url: 'cart-function.php',
                                    data: "prod_id=" + product_id,
                                    success: function(data)
                                    {
                                        alert("success!"+data);
                                    }
                                });
                            }
                            
                        else
                        {
                            window.alert("You have to log in to add product to cart");  
                        }
                    }

                        function like(id, product_id)
                        {
                            
                            if(!<?php echo isset($_SESSION['email'])?'false':'true'; ?>)
                            {
                            if (document.getElementById(id).className=="fa fa-heart-o")
                            {
                                document.getElementById(id).className="fa fa-heart";
                                //alert("the content "+ id+ " "+product_id);
                                //alert($(this).attr('id'));
                                $.ajax({
                                    type: "POST",
                                    url: 'like.php',
                                    data: "prod_id=" + product_id,
                                    success: function(data)
                                    {
                                        alert("success!"+data);
                                    }
                                });
                            }
                            else if (document.getElementById(id).className="fa fa-heart")
                            {
                                document.getElementById(id).className="fa fa-heart-o"; 
                                $.ajax({
                                    type: "POST",
                                    url: 'delete-like.php',
                                    data: "prod_id=" + product_id,
                                    success: function(data)
                                    {
                                        alert("success!"+data);
                                    }
                                });
                            }
                            }
                        else
                        {
                            window.alert("You have to log in to like a product");  
                        }
                    }

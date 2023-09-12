<div id="footer"><!--     #footer Begin     -->
    <div class="container"><!--     container Begin     -->
        <div class="row"><!--     row Begin     -->
            <div class="col-sm-6 col-md-3"><!--     col-sm-6 col-md-3 Begin     -->
                
                <h4>Pages</h4>
                
                <ul><!--     ul Begin     -->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul><!--     ul Finish     -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!--     ul Begin     -->
                                
                    <?php 

                    if(!isset($_SESSION['customer_email'])){

                        echo "<a href='checkout.php'>Login</a>";

                    }else{

                        echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

                    }

                    ?>
                                
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!--     ul Finish     -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!--     col-sm-6 col-md-3 Finish     -->
            
            <div class="com-sm-6 col-md-3"><!--     com-sm-6 col-md-3 Begin     -->
                
                <h4>Top Products Categories</h4>
                
                <ul><!--     ul Begin     -->
                
                    <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                        }
                    
                    ?>
                
                </ul><!--     ul Finish     -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!--     com-sm-6 col-md-3 Finish     -->
            
            <div class="col-sm-6 col-md-3"><!--     col-sm-6 col-md-3 Begin     -->
                
                <h4>Find Us: </h4>
                
                <p><!--     p Start     -->
                    
                    <strong>Barry Svie inc.</strong>
                    <br/>China
                    <br/>Jiangsu
                    <br/>0512-0375-8888
                    <br/>shichao_jia@163.com
                    <br/><strong>Barry</strong>
                    
                </p><!--     p Finish     -->
                
                <a href="contact.php">Check Out Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!--     col-sm-6 col-md-3 Finish     -->
            
            <div class="col-sm-6 col-md-3"><!--     col-sm-6 col-md-3 Begin     -->
                
                <h4>Get The News</h4>
                
                <p class="text-muted">
                    Dont miss our latest update products.
                </p>
                
                <form action="https://mail.qq.com/cgi-bin/frame_html?sid=CgFgTu4ewK3KMCFB&r=b45e4aec87adbed0db4a398561778d5b" method="post" target="popupwindow" onsubmit="window.open('https://mail.qq.com/cgi-bin/frame_html?sid=CgFgTu4ewK3KMCFB&r=b45e4aec87adbed0db4a398561778d5b?uri-M-devMedia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post"><!--     form Begin     -->
                    <div class="input-group"><!--     input-group Begin     -->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        
                        <span class="input-group-btn"><!--     input-group-btn Begin     -->
                            
                            <input type="submit" value="subscribe" class="btn btn-default">
                            
                        </span><!--     input-group-btn Finish     -->
                        
                    </div><!--     input-group Finish     -->
                </form><!--     form Finish     -->
                
                <hr>
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div><!--     col-sm-6 col-md-3 Finish     -->
            
        </div><!--     row Finish     -->
    </div><!--     container Finish     -->
</div><!--     #footer Finish     -->


<div id="copyright"><!--     #copyright Begin     -->
    <div class="container"><!--     container Begin     -->
        <div class="col-md-6"><!--     col-md-6 Begin     -->
            
            <p class="pull-left">&copy; 2021 Sylvie's Store All Rights Reserve</p>
            
        </div><!--     col-md-6 Finish     -->
        <div class="col-md-6"><!--     col-md-6 Begin     -->
            
            <p class="pull-right">Theme by: <a href="#">Barry</a></p>
            
        </div><!--     col-md-6 Finish     -->
    </div><!--     container Finish     -->
</div><!--     #copyright Finish     -->
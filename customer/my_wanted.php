<center><!--     center Begin     -->
    
    <h1> My Wanted</h1>
    
    <p class="lead"> Your wanted products on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>. 
        
    </p>
    
</center><!--     center Finish     -->


<hr>


<div class="table-responsive"><!--     table-responsive Begin     -->
    
    <div id="row same-height-row"><!--  #row same-height-row Begin    -->
        <div class="col-md-3 col-sm-6"><!--  col-md-3 col-sm-6 Begin    -->
            <div class="box same-height headline"><!--  box same-height headline Begin    -->
                <h3 class="text-center">Products</h3>
                <h3 class="text-center">You</h3>
                <h3 class="text-center">Wanted</h3>
            </div><!--  box same-height headline Finish    -->
        </div><!--  col-md-3 col-sm-6 Finish    -->

        <?php 
        
        $customer_session = $_SESSION['customer_email'];
            
        $get_customer = "select * from customers where customer_email='$customer_session'";

        $run_customer = mysqli_query($con,$get_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];
        
        $get_w_id = "select * from wanted_pro where customer_id='$customer_id'";
        
        $run_w_id = mysqli_query($con,$get_w_id);
        
        while($row_w_id=mysqli_fetch_array($run_w_id)){
            
            $ppp_id = $row_w_id['product_id'];
            
            $get_products = "select * from products where product_id='$ppp_id'";

            $run_products = mysqli_query($con,$get_products);
            
            while($row_products=mysqli_fetch_array($run_products)){
                
                if($row_products['product_id']==$row_w_id['product_id']){
                    
                    $pro_id = $row_products['product_id'];

                    $pro_title = $row_products['product_title'];

                    $pro_price = $row_products['product_price'];

                    $pro_img1 = $row_products['product_img1'];

                    echo "

                    <div class='col-md-3 col-sm-6 center-responsive'>

                        <div class='product same-height'>

                            <a href='../details.php?pro_id=$pro_id'>

                                <img class='img-responsive' src='../admin_area/product_images/$pro_img1'>

                            </a>

                            <div class='text'>

                                <h3>

                                    <a href='details.php?pro_id=$pro_id'>

                                        $pro_title

                                    </a>

                                </h3>

                                <p class='price'>

                                    $ $pro_price

                                </p>

                            </div>

                        </div>

                    </div>

                    ";
                    
                }

            }
            
        }

        

        ?>

    </div><!--  #row same-height-row Finish    -->
    
</div><!--     table-responsive Finish     -->



<center><!--     center Begin     -->
    
    <h1> My Loyalty</h1>
    
    <p class="lead"> Your coupons on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>. 
        
    </p>
    
</center><!--     center Finish     -->


<hr>


<div class="table-responsive"><!--     table-responsive Begin     -->
    
    <table class="table table-bordered table-hover"><!--     table table-bordered table-hove Begin     -->
        
        <thead><!--     thead Begin     -->
            
            <tr><!--     tr Begin     -->
                
                <th> ON: </th>
                <th> Denomination: </th>
                <th> Qty: </th>
                <th> Release Date: </th>
                <th> Status: </th>
                
            </tr><!--     tr Finish     -->
            
        </thead><!--     thead Finish     -->
        
        <tbody><!--     tbody Begin     -->
           
           <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from coupons where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $domination = $row_orders['denomination_price'];
                
                $coupon_qty = $row_orders['coupon_qty'];
                
                $coupon_date = $row_orders['coupon_date'];
                
                $coupon_status = $row_orders['coupon_status'];
                
                $i++;
                
            ?>
            
            <tr><!--     tr Begin     -->
                
                <th> <?php echo $i; ?> </th>
                
                <td> $<?php echo $domination; ?> </td>
                <td> <?php echo $coupon_qty; ?> </td>
                <td> <?php echo $coupon_date; ?> </td>
                <td> <?php echo $coupon_status; ?> </td>
                
                <?php } ?>
                
            </tr><!--     tr Finish     -->
            
        </tbody><!--     tbody Finish     -->
        
    </table><!--     table table-bordered table-hove Finish     -->
    
</div><!--     table-responsive Finish     -->



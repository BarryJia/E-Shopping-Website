<?php 


include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    echo $customer_id;
}

$ip_add = getRealIpUser();

$status = "Pending";

$coupons_status = "Avaluable";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];
    
    $pro_size = $row_cart['size'];
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['product_price']*$pro_qty;
        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
        
        $run_customer_order = mysqli_query($con,$insert_customer_order);
        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        $coupon_price = $sub_total/10;
        
        $check_coupon = "select * from coupons where customer_id='$customer_id' AND denomination_price='$coupon_price'";
        
        $run_check = mysqli_query($db,$check_coupon);
        
        if(!mysqli_num_rows($run_check)>0){
        
            $insert_coupon = "insert into coupons (denomination_price,coupon_qty,coupon_date,coupon_status,customer_id) values ('$coupon_price',1,NOW(),'$coupons_status','$customer_id')";

            $run_coupon = mysqli_query($con,$insert_coupon);
        
        }else{
            
            $select_coupon = "select * from coupons where customer_id='$customer_id' AND denomination_price='$coupon_price'";
            
            $run_coupon = mysqli_query($con,$select_coupon);
            
            while($row_coupon = mysqli_fetch_array($run_coupon)){
            
                $coupon_qty = $row_coupon['coupon_qty'] + 1;
            
                $update_coupon = "update coupons set coupon_qty='$coupon_qty' where customer_id='$customer_id' AND denomination_price='$coupon_price'";

                $run_update_coupon = mysqli_query($con,$update_coupon);
                
            }
            
        }
        
        if($run_customer_order AND $run_pending_order){
            
            echo "<script>alert('Your orders has been submitted, and coupon has been sent to your account')</script>";
        
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
            
        }
        
    }
    
}

?>
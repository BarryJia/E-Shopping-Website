<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

          if(isset($_GET['delete_order'])){
              
              $delete_id = $_GET['delete_order'];
              
              $delete_customer_order = "delete from customer_orders where order_id='$delete_id'";
              
              $delete_pending_order = "delete from pending_orders where order_id='$delete_id'";
              
              $run_c_delete = mysqli_query($con,$delete_customer_order);
              
              $run_p_delete = mysqli_query($con,$delete_pending_order);
              
              if($run_c_delete AND $run_p_delete){
                  
                  echo "<script>alert('One of your orders has been Deleted')</script>";
                  
                  echo "<script>window.open('index.php?view_orders','_self')</script>";
                  
              }
              
          }

?>

<?php } ?>
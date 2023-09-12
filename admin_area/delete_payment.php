<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

          if(isset($_GET['delete_payment'])){
              
              $delete_id = $_GET['delete_payment'];
              
              $delete_pay = "delete from payments_new where payment_id='$delete_id'";
              
              $run_delete = mysqli_query($con,$delete_pay);
    
                if($run_delete){

                    echo "<script>alert('One of your payments has been deleted')</script>";

                    echo "<script>window.open('index.php?view_payments','_self')</script>";

                }
              
          }

?>

<?php } ?>
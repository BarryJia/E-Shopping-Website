<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>

<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!--     form Begin     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Name: </label>
        
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Email: </label>
        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Country: </label>
        
        <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer City: </label>
        
        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Contact: </label>
        
        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Address: </label>
        
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div><!--     form-group Finish     -->
    
    <div class="form-group"><!--     form-group Begin     -->
        
        <label> Costumer Image: </label>
        
        <input type="file" name="c_image" class="form-control  form-height-custom" required>
        
        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Customer Image">
        
    </div><!--     form-group Finish     -->
    
    <div class="text-center"><!--     text-center Begin     -->
        
        <button name="update" class="btn btn-primary"><!--     btn btn-primary Begin     -->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button><!--     btn btn-primary Finish     -->
        
    </div><!--     text-center Finish     -->
    
</form><!--     form Finish     -->


<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $update_name = $_POST['c_name'];
    
    $update_email = $_POST['c_email'];
    
    $update_country = $_POST['c_country'];
    
    $update_city = $_POST['c_city'];
    
    $update_contact = $_POST['c_contact'];
    
    $update_address = $_POST['c_address'];
    
    $update_image = $_FILES['c_image']['name'];
    
    $update_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($update_image_tmp,"customer_image/$update_image");
    
    $update_customer = "update customers set customer_name='$update_name',customer_email='$update_email',customer_country='$update_country',customer_city='$update_city',customer_address='$update_address',customer_contact='$update_contact',customer_image='$update_image' where customer_id='$update_id'";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
                                
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>
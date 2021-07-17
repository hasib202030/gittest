
<?php // include 'admin_header.php' ?>
<?php

 if (isset($_POST['create_user'])) 

          {
         
            
       $user_firstname =  $_POST['user_firstname'];
       $user_lastname =  $_POST['user_lastname'];
       $user_role =  $_POST['user_role'];

       $username =  $_POST['username'];
       $user_email =  $_POST['user_email'];
       $user_password =  $_POST['user_password'];

          
      //  $post_date =  date('d-m-y');
      //  $post_image =  $_FILES['post_image']['name'];
      //  $post_image_temp =  $_FILES['post_image']['tmp_name'];
      //  move_uploaded_file($post_image_temp, "img/$post_image");
        
          if(empty($user_firstname)) {

          echo "<h2>Please fill the box</h2>";

         }else{

      	$sql = "INSERT INTO users (user_firstname,user_lastname,user_role,username,user_email,user_password) VALUES ( '$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";

         	$create_user_query = mysqli_query($connection, $sql);

         	confirmQuery($create_user_query);

          }

         }
?> 




<form class="g-3" action="" method="POST" enctype="multipart/form-data">

  <div class="row">

      <div class="col-md-5">
        <label for="user_firstname" class="form-label">First Name</label>
        <input type="text" class="form-control"  name="user_firstname" id="inputEmail4">
      </div> 

      <div class="col-md-5">
        <label for="post_title" class="form-label">Last Name</label>
        <input type="text" class="form-control"  name="user_lastname" id="inputEmail4">
      </div>  
  


      <div class="col-md-2">
      <label for="post_title" class="form-label">Select User Role</label>
      <select class="form-control" name="user_role">
        <option value="subscriber">Select Options</option>
        <option value="Admin">Admin</option>
        <option value="subscriber">subscriber</option>
      
      </select>
      </div>  

     


  </div>


  <div class="row">
  <div class="col-md-6">
    <label for="post_author" class="form-label">User Name</label>
    <input type="text" class="form-control"  name="username" id="inputEmail4">
  </div>  
  <div class="col-md-6">
    <label for="post_status" class="form-label">Email</label>
    <input type="email" class="form-control"  name="user_email" id="inputPassword4">
  </div> 
</div>

  <div class="row">

  <div class="col-md-6">
    <label for="post_image" class="form-label">Password</label>
    <input type="password" class="form-control"  name="user_password" id="inputEmail4">
  </div>  

</div> <br>


  <div class="col-6">
    <button type="submit" name="create_user" class="btn btn-primary">Add User</button>
  </div>
</form>
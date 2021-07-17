
<?php include 'admin_header.php' ?>
<?php

 if ($_GET['edit_user']) {
    $the_user_id = $_GET['edit_user'];


    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection, $query);   

  
    while ($row = mysqli_fetch_assoc($select_users_query)) 
    {
      $user_id =  $row['user_id'];
      $username =  $row['username'];
      $user_password =  $row['user_password'];
      $user_firstname =  $row['user_firstname'];
      $user_lastname =  $row['user_lastname'];
      $user_email =  $row['user_email'];
      $user_image =  $row['user_image'];
      $user_role =  $row['user_role'];
    } // loop end

 } // if end 


 if (isset($_POST['edit_user'])) 

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

    
  //===hash password show inputv box ====
  $query = "SELECT randSalt FROM users";

  $select_randsalt_query = mysqli_query($connection, $query);
  if (!$select_randsalt_query) {
    die("Query Faild " . mysqli_error($connection));
  }
  
  $row = mysqli_fetch_array($select_users_query);
  $salt = $row['randSalt'];
  $hashed_password = crypt($user_password, $salt);
//========
        
          if(empty($user_firstname)) {

          echo "<h2>Please Input User Info</h2>";

         }else{



            $query = "UPDATE users SET ";
            $query .= "user_firstname = '{$user_firstname}', ";
            $query .=  "user_lastname = '{$user_lastname}', ";          
            $query .=  "user_role = '{$user_role}',";                                    
            $query .=  "username = '{$username}', ";                                    
            $query .=  "user_email = '{$user_email}', ";                                    
            $query .=  "user_password = '{$hashed_password}' "; 
            $query .=  "WHERE user_id = '{$the_user_id}' "; 

            $edit_user_query = mysqli_query($connection, $query);

             confirmQuery($edit_user_query);          

        

          }

         }
?> 




<form class="g-3" action="" method="POST" enctype="multipart/form-data">

  <div class="row">

      <div class="col-md-4">
        <label for="user_firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname?>" name="user_firstname" id="inputEmail4">
      </div> 

      <div class="col-md-4">
        <label for="post_title" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname?>" name="user_lastname" id="inputEmail4">
      </div>  
  
 

      <div class="col-md-4">
      <select class="form-control"  name="user_role">

        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?>  </option>
        
        <?php

        // admin  & sub.. db auto show 
        if ($user_role == 'admin') {
            echo "<option value='subscriber'>subscriber</option>";
        }
         
        else {
            echo "<option value='admin'>Admin</option>";
        }

        ?>
       


        
        
      
      </select>
      </div>  

     


  </div>


  <div class="row">
  <div class="col-md-6">
    <label for="post_author" class="form-label">User Name</label>
    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username" id="inputEmail4">
  </div>  
  <div class="col-md-6">
    <label for="post_status" class="form-label">Email</label>
    <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email" id="inputPassword4">
  </div> 
</div>

  <div class="row">

  <div class="col-md-6">
    <label for="post_image" class="form-label">Password</label>
    <input type="password" class="form-control" value="<?php echo $user_password?>" name="user_password" id="inputEmail4">
  </div>  

</div> <br>


  <div class="col-6">
    <button type="submit" name="edit_user" class="btn btn-primary">Update User</button>
  </div>
</form>
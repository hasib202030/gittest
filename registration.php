<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php
    
    if (isset($_POST['submit'])) {
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         if (!empty($username) && !empty($email) && !empty($password)) {


            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);

         //   $2y10$iusesomecrazysstring22
           $query = "SELECT randSalt FROM users";
           $select_randsalt = mysqli_query($connection, $query);
         
           if (!$select_randsalt) {
              die("Query not work" . mysqli_error($connection));
           }
         
           // password encpt 
         //   while ($row = mysqli_fetch_array($select_randsalt)){
         //     //   echo $salt = $row['randSalt']; // test data pw and final slad ran 
         //       echo $salt = $row['randSalt'];
         
          $row = mysqli_fetch_array($select_randsalt);
             
                $salt = $row['randSalt'];
                //=====user password crypt=======
                  $password = crypt($password, $salt);  
 
                ///==============
         
                // query 
                $query = "INSERT INTO users (username, user_email, user_password, user_role)"; // 'subscriber is by defult value change to admin '
                $query .="VALUES('{$username}', '{$email}', '{$password}', 'subscriber' )";
                $resister_user_query = mysqli_query($connection,$query);
         
                  if (!$resister_user_query) {
                      die("Query Failed" . mysqli_error($connection));
                  } //{
                // echo "Registration Successyfully";
         
                //  header("Location: login.php");                     
                //  }

                $message = "Your Registration successfully ";

            
         }else{
             $message ="Registration Info can't be empty";
         }
  
    } else{
        // reg.. not mass...
        $message= "";
    }
    
    
    ?>



    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h2 class="text-success bg-success"><?php echo $message ?></h2>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter  Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="your email">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>



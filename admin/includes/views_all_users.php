<div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">                
                    <div class="clo-lg-12">                    	
                    	 <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>
                    <table class="table table-bordered table:hover">
                    	<thead>
                    		<tr>
                    			<th>ID</th>
                    			<th>User Name</th>
                    			<th>First Name</th>
                    			<th>Last Name</th>
                    			<th>Email</th>
                    			<th>Role</th>
                    			<th>Admin</th>
                    			<th>Subscriber</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		
                    		</tr>
                    	</thead>
                    	<tbody>

			              		<?php
				            	 $query = "SELECT * FROM users ";
                                   $select_users = mysqli_query($connection, $query);   
                              
                                 
                                   while ($row = mysqli_fetch_assoc($select_users)) 
                                   {
                                     $user_id =  $row['user_id'];
                                     $username =  $row['username'];
                                     $user_password =  $row['user_password'];
                                     $user_firstname =  $row['user_firstname'];
                                     $user_lastname =  $row['user_lastname'];
                                     $user_email =  $row['user_email'];
                                     $user_image =  $row['user_image'];
                                     $user_role =  $row['user_role'];

									echo "<tr>";

									echo "<td> $user_id </td>";
									echo "<td> $username </td>";
									echo "<td> $user_firstname </td>";
									echo "<td> $user_lastname </td>";
									echo "<td> $user_email </td>";								
									echo "<td> $user_role </td>";  
                  echo "<td> <a href='users.php?change_to_admin=$user_id'>Admin</a></td>";               
                  echo "<td> <a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";

                  echo "<td> <a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";  

                  // echo "<td> <a href='users.php?delete=$user_id'>Delete</a></td>";               
                  echo "<td> <a onClick=\"javascript: return confirm('Are you sure to delete user'); \" href='users.php?delete=$user_id'>Delete</a></td>";               
                  echo "</tr>";

                     } 
                     
                      ?>

                    	</tbody>
                    </table>


                    <?php
                    if (isset($_GET['change_to_admin'])) {
                      $the_user_id = $_GET['change_to_admin'];
                      $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";

                      $change_to_admin_query = mysqli_query($connection, $query);
                      header("Location: users.php");
                    }
                    
                    ?>

                       <?php
                    if (isset($_GET['change_to_sub'])) {
                      $the_user_id = $_GET['change_to_sub'];
                      $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";

                      $change_to_sub_query = mysqli_query($connection, $query);
                      header("Location: users.php");
                    }
                    
                    ?>



                    <!-- user delete funcations  -->
                    <?php deleteUser();?>

                    </div>
                  </div>                 
                </div>
       </div>
      
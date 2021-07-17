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
                    			<th>Author</th>
                    			<th>Title</th>
                    			<th>Categories</th>
                    			<th>Status</th>
                    			<th>Image</th>
                    			<th>Tags</th>
                    			<th>Comments</th>
                    			<th>Date</th>
                    			<th>Edit</th>
                          <th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>

					<?php

					 $query = "SELECT * FROM posts";
                                   $select_posts = mysqli_query($connection,$query);

                                   while ($row = mysqli_fetch_assoc($select_posts)) 
                                   {
                                     $post_id =  $row['post_id'];
                                     $post_author =  $row['post_author'];
                                     $post_title =  $row['post_title'];
                                     $post_category_id =  $row['post_category_id'];
                                     $post_date =  $row['post_date'];
                                     $post_image =  $row['post_image'];
                                     $post_comment_count =  $row['post_comment_count'];
                                     $post_tags =  $row['post_tags'];
                                     $post_status =  $row['post_status'];


									echo "<tr>";
									echo "<td> $post_id </td>";
									echo "<td> $post_author </td>";
									echo "<td> $post_title </td>";

                  // categories name show view page loop
                  $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                  $select_categories_id =mysqli_query($connection,$query);
                  
                    while($row = mysqli_fetch_assoc($select_categories_id)){

                      $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];  

									
                }
                // echo "<td> $post_category_id </td>";
                // new add cat_title
                  echo "<td> $cat_title </td>";
									echo "<td> $post_status </td>";
									echo "<td> <img width='200px' src='img/$post_image' alt='img' >  </td>";
									echo "<td> $post_tags </td>";
									echo "<td> $post_comment_count </td>";
									echo "<td> $post_date </td>";
                  echo "<td> <a href='posts.php?source=edit_posts&p_id=$post_id'>Edit</a></td>";
                  echo "<td> <a href='posts.php?delete=$post_id'>Delete</a></td>";
									echo "</tr>";



                                 }

					    ?>

                    	
                    	</tbody>
                    </table>

                    <!-- delete posts -->

                <?php

   if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $sql = "DELETE FROM posts WHERE post_id = '$post_id'";
    $deleted_data = mysqli_query($connection, $sql);
    // not refesh code 
    header("Location: posts.php");

    if($deleted_data){
        echo "Data Delete Successfully";
    }else{
        echo "Data Delete Not Successfully";
    }


  }// main if end



?>

                    </div>

                  </div>
                 
                </div>
       </div>
      
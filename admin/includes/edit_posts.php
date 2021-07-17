	<?php include_once './funcation.php' ?>
  
  <?php


		if (isset($_GET['p_id'])) {
			$the_post_id = $_GET['p_id'];
		}

		 $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
          $select_posts_by_id = mysqli_query($connection,$query);

             while ($row = mysqli_fetch_assoc($select_posts_by_id)) 
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
                                      $post_content =  $row['post_content'];

                                 }

                                 if (isset($_POST['update_post'])) {
                                 	
                               
                                    
                                     $post_author =  $_POST['post_author'];
                                     $post_title =  $_POST['post_title'];
                                     // post_category is select options bar
                                     $post_category_id =  $_POST['post_category'];
                                     $post_status =  $_POST['post_status'];
                                     // image is  input update file name 
                                     $post_image =  $_FILES['image']['name'];
                                     $post_image_temp =  $_FILES['image']['tmp_name'];
                                     $post_tags =  $_POST['post_tags'];                                    
                                     $post_content =  $_POST['post_content'];



                                     move_uploaded_file($post_image_temp, "img/$post_image");

                                    // img uplode and save loops 
                                     if (empty($post_image)) {
                                       $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                                       $select_image = mysqli_query($connection,$query);
                                      while($row = mysqli_fetch_array($select_image)){
                                      $post_image = $row['post_image'];
                                      } // while loop end
 
                                     } //if end


                                     $query = "UPDATE posts SET ";
                                     $query .= "post_author = '{$post_author}', ";
                                     $query .=  "post_title = '{$post_title}', ";
                                     $query .=  "post_category_id = '{$post_category_id}', "; 
                                     $query .=  "post_date = now(), "; 
                                     $query .=  "post_status = '{$post_status}',";                                    
                                     $query .=  "post_image = '{$post_image}', ";                                    
                                     $query .=  "post_tags = '{$post_tags}', ";                                    
                                     $query .=  "post_content = '{$post_content}' "; 
                                     $query .=  "WHERE post_id = '{$the_post_id}' "; 

                                     $update_post = mysqli_query($connection, $query);

                           confirmQuery($update_post);          

                                  // if(! $update_post){
                                  //   die("Query Failed " . mysqli_error($connection));
                                  // }


                                 }


                                



?>





<form class="g-3" action="" method="POST" enctype="multipart/form-data">
  <div class="row">
  <div class="col-md-6">
    <label for="post_title" class="form-label">Post Title</label>
    <input type="text" class="form-control"  value="<?php echo $post_title; ?>" name="post_title" id="inputEmail4">
  </div>  
  

      <div class="col-md-6">
        <label for="#" class="form-label">  Select Categorie</label>
        <select name="post_category" id="">
          <!-- categories selection script -->
          <?php
                $query = "SELECT * FROM categories";
                  $select_categories = mysqli_query($connection,$query);
                  
                  confirmQuery($select_categories);

                  while ($row = mysqli_fetch_assoc($select_categories)) 
                    {
                  $cat_id =  $row['cat_id'];
                  $cat_title =  $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
          ?>
        </select>
      </div> 
    </div>



  <div class="row">
  <div class="col-md-6">
    <label for="post_author" class="form-label">Post Author</label>
    <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author" id="inputEmail4">
  </div>  
  <div class="col-md-6">
    <label for="post_status" class="form-label">Post Status</label>
    <input type="text" class="form-control"  value="<?php echo $post_status; ?>" name="post_status" id="inputPassword4">
  </div> 
</div>

  <div class="row">
  <div class="col-md-6">   

  	<img width="100px" src="img/<?php echo $post_image; ?>" alt="img" >
    <input type="file" name="image">
   <!--  <input type="file" class="form-control" value="<?php //echo $post_image; ?>"  name="post_image" id="inputEmail4"> -->
  </div>  
  <div class="col-md-6">
    <label for="post_tags" class="form-label">Post Tag</label>
    <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags" id="inputPassword4">
  </div> 
</div>

 <div class="row">
  <div class="col-md-12">
    <label for="post_content" class="form-label">Post Content</label>
    <textarea type="text" class="form-control" value="" name="post_content" id="inputEmail4" cols="30" rows="10"><?php echo $post_content; ?></textarea>
  </div>  
 
</div>




  <div class="col-6">
    <button type="submit" name="update_post" class="btn btn-primary">Update Post</button>
  </div>
</form>
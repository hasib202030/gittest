
<?php include 'admin_header.php' ?>
<?php

 if (isset($_POST['submit'])) 

          {
         
       $post_author =  $_POST['post_author'];
       $post_title =  $_POST['post_title'];
       $post_category_id =  $_POST['post_category'];
       $post_status =  $_POST['post_status'];

       $post_date =  date('d-m-y');
       $post_image =  $_FILES['post_image']['name'];
       $post_image_temp =  $_FILES['post_image']['tmp_name'];

      
       $post_tags =  $_POST['post_tags'];
       $post_content =  $_POST['post_content'];
       	$post_comment_count = 4;

     move_uploaded_file($post_image_temp, "img/$post_image");
        
          if(empty($post_title)) {

          echo "Plase fill the box";

         }else{

         	$sql = "INSERT INTO posts (post_author,post_title,post_category_id,post_status,post_image,post_comment_count,post_tags,post_content,post_date) VALUES ( '$post_author','$post_title','$post_category_id','$post_status','$post_image','$post_comment_count','$post_tags','$post_content','$post_date')";
         	$create_post_query = mysqli_query($connection, $sql);

         // 	if($inserted_data){

         // 	echo "Data insert successfully";

         // }else{
         // 	echo "Data insert not successfully";
         // }


         //  }

         // }

         	confirmQuery($create_post_query);

         	


          }

         }

?> 




<form class="g-3" action="" method="POST" enctype="multipart/form-data">
  <div class="row">
  <div class="col-md-6">
    <label for="post_title" class="form-label">Post Title</label>
    <input type="text" class="form-control"  name="post_title" id="inputEmail4">
  </div>  
  
  <!-- <div class="col-md-6">
    <label for="post_category_id" class="form-label">Post Categories ID</label>
    <input type="text" class="form-control"  name="post_category_id" id="inputPassword4">
  </div> 
</div> -->

<!-- new add  -->
<div class="col-md-6">
        <label for="#" class="form-label">  Select Categorie</label><br>
        <select class="form-control" name="post_category" id="">
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
    <input type="text" class="form-control"  name="post_author" id="inputEmail4">
  </div>  
  <div class="col-md-6">
    <label for="post_status" class="form-label">Post Status</label>
    <input type="text" class="form-control"  name="post_status" id="inputPassword4">
  </div> 
</div>

  <div class="row">
  <div class="col-md-6">
    <label for="post_image" class="form-label">Post Img</label>
    <input type="file" class="form-control"  name="post_image" id="inputEmail4">
  </div>  
  <div class="col-md-6">
    <label for="post_tags" class="form-label">Post Tag</label>
    <input type="text" class="form-control" name="post_tags" id="inputPassword4">
  </div> 
</div>

 <div class="row">
  <div class="col-md-12">
    <label for="post_content" class="form-label">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="inputEmail4" cols="30" rows="10"></textarea>
  </div>  
 
</div>




  <div class="col-6">
    <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
  </div>
</form>
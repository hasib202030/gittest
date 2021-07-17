                           <form action="" method="POST">
                        <div class="from-group">
                            <label for="cat_title"> Edit Categories</label>

                            <?php 

                           if (isset($_GET['edit'])) {

                             $cat_id = $_GET['edit'];

                               $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                            $select_categories_id = mysqli_query($connection,$query);
                               while ($row = mysqli_fetch_assoc($select_categories_id)) 
                                   {
                                     $cat_id =  $row['cat_id'];
                                     $cat_title =  $row['cat_title'];

                                     ?>

                     <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

                          <?php }} ?>  

                     <!-- edit code -->
                          <?php

                              if (isset($_POST['update_categorties'])) {
                                  
                                  $the_cat_title = $_POST['cat_title'];
                                 // = "UPDATE categories SET cat_title = {'$the_cat_title'} WHERE cat_id = {$cat_id}";

                                   $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";

                                  $update_query = mysqli_query($connection, $query);

                                if (!$update_query) {
                                    die("Update filed" . mysqli_error($connection));
                                }
                            }

                                 ?>


                        </div> <br>

                        <div class="from-group">
                            <input class="btn btn-primary" type="submit" name="update_categorties" value="Update Categories">
                        </div>
                        </form>
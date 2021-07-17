
            <div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- form search close -->                 
                   
                </div>  
                
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="user name">                       
                    </div>  
                    
                     <div class="input-group">                
                        <input type="password" name="password" class="form-control" placeholder="user password">                       
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                        </span>
                   
                    </div>


                    </form> <!-- form search close -->                 
                   
                </div>





                <!-- Blog Categories Well -->
                <div class="well">



                <?php
                        // limited post show   $query = "SELECT * FROM categories LIMIT 3";
                       $query = "SELECT * FROM categories";
                       $select_all_categories_sidbar = mysqli_query($connection,$query);
                     
                       ?> 




                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php
                                   while ($row = mysqli_fetch_assoc($select_all_categories_sidbar)) 
                                   {
                                     $cat_title =  $row['cat_title'];
                                     echo "<li><a href='#'>{$cat_title}</a></li>";
                                   }
                                
                                ?>

                            </ul>
                        </div>
                  
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include 'widget.php' ?>

            </div>

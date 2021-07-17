<?php include 'includes/admin_header.php' ?>

<div id="wrapper">
      <?php include 'includes/admin_nav.php' ?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">

                        <?php  insert_categories(); ?>             

                        <form action="" method="POST">
                        <div class="from-group">
                            <label for="cat_title"> Add Categories</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div> <br>

                        <div class="from-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
                        </div>
                        </form><br>


                        <!-- include update category -->
                        <?php 

                        if (isset($_GET['edit'])) {
                           
                           $cat_id = $_GET['edit'];

                           include 'includes/update_categoties.php';

                       }
                        ?>
                        <!-- inclides update categorys ends -->

                    </div> <!-- add categories  -->

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id </th>
                                     <th>Categories Title</th>
                                    
                                </tr>
                            </thead>
                            <tbody>                                
                         <!-- categories Quire  -->
                                <?php findAllCategories(); ?>

                      <!-- Delete Quire -->
                               <?php  deleteCategories(); ?>                         


                            </tbody>
                        </table>
                    </div>
                 
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php' ?>
   
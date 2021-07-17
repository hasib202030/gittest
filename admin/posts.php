<?php include 'includes/admin_header.php' ?>

<div id="wrapper">
      <?php include 'includes/admin_nav.php' ?>
    <div id="page-wrapper">

   			<?php 

   			if (isset($_GET['source'])) {
   				
   				$source = $_GET['source'];

   			}else{
   				$source = '';
   			}


   			switch ($source) {

   				case 'add_post':
   			    include 'includes/add_posts.php';
   					break;

   						case 'edit_posts':
   			       include 'includes/edit_posts.php';
   					break;

   						case '200':
   			    echo "NICE 200";
   					break;
   				
   				default:
   					
   					include 'includes/views_all_posts.php';
   					break;
   			}

   			?>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php' ?>
   
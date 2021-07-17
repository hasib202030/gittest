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

   				case 'add_user':
   			    include 'includes/add_users.php';
   					break;

   						case 'edit_user':
   			       include 'includes/edit_user.php';
   					break;

   						case '200':
   			    echo "NICE 200";
   					break;
   				
   				default:
   					
   					include 'includes/views_all_users.php';
   					break;
   			}

   			?>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php' ?>
   

<?php 

 //========create post funcaton=====

    function confirmQuery($result){

    	global $connection;

    	 	if(!$result){

         	die("QUIRE Filed ." . mysqli_error($connection));

         }

         return $result;
    }






//============ add main code Insert or Create Categories ==============
	function insert_categories(){

		// golobal connactions file
		global $connection;

        if (isset($_POST['submit']))
        {
            $cat_title = $_POST['cat_title'];

            if (empty($cat_title)){
                echo "Plz... Fill the  box";
            }else{

              $sql = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
              $inserted_data = mysqli_query($connection,$sql);

              if ($inserted_data){
                  echo "insert successfully";
              }else{
                  echo "insert not successfully";
              }

            }
        }

	}


//===========all funcations categories Query===============

	 function findAllCategories(){
	 	global $connection;

	 	  // limited post show   $query = "SELECT * FROM categories LIMIT 3";
                                   $query = "SELECT * FROM categories";
                                   $select_categories = mysqli_query($connection,$query);

                                   while ($row = mysqli_fetch_assoc($select_categories)) 
                                   {
                                     $cat_id =  $row['cat_id'];
                                     $cat_title =  $row['cat_title'];

                                     echo "<tr>";
                                     echo "<td>{$cat_id}</td>";
                                     echo "<td>{$cat_title}</td>";
                                     echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                     

                                     echo "</tr>";

                }          
	 }



//===========Delete Quiry===============

	 function deleteCategories(){

	 	global $connection;
	 	
	 	   if (isset($_GET['delete'])) {
                                  
                   $the_cat_id = $_GET['delete'];
                   $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                  $delete_query = mysqli_query($connection, $query);
                  // not refesh code 
                 header("Location: categories.php");

             }
	 }


     //===========user delete Quiry===============

	 function deleteUser(){

        global $connection;
        
           if (isset($_GET['delete'])) {
                                 
                  $the_cat_id = $_GET['delete'];
                  $query = "DELETE FROM users WHERE user_id = {$the_cat_id}";
                 $delete_query = mysqli_query($connection, $query);
                 // not refesh code 
                header("Location: users.php");

            }
    }







?>
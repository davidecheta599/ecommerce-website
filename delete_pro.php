 <?php include("includes/db.php"); ?>
 
 <?php 
    if (isset($_GET['delete_pro'])) {
		
	$delete_id = $_GET['delete_pro'];         //now les get hold of that invisible $pro_id as $delete_id from $_GET['delete_pro']

$delete_pro = "delete from products where product_id ='$delete_id'";

$run_delete =mysqli_query($con, $delete_pro);

if($run_delete){
	
	echo"<script>alert('A product has been delete!')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
		
	
	
}	
		
		
	}
 
 
 
 
 
 ?>
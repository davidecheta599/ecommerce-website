<?php



if(!isset($_SESSION['user_email']))  //'user_email' is from the database 


{
	
echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";	
	
}   else{



?>

<table width="795" align="center" bgcolor="pink">


<tr align="center">
<td colspan="6"><h2>View all categories Here  </h2></td>

</tr >



<tr align="center" bgcolor="skyblue">
      <th>Category ID</th>
	   <th>Category Title</th>
	    <th>Edit</th>
		   <th>Delete</th>



</tr>
<?php 

include("includes/db.php");

$get_cat = "select * from categories";

$run_cat = mysqli_query($con,$get_cat);

$i =0 ;  //starting from the first number an keep increementin

while($row_cat=mysqli_fetch_array($run_cat)){
	
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];
	$i++;
?>
   <tr align="center">
   <td><?php echo $i;?></td>
   <td><?php echo $cat_title;?></td>
 
    <td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</td>
    <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</td>
   
   </tr>	
<?php  } ?>  





</table><?php }?>
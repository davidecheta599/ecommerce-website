<!DOCTYPE HTML>
<?php

session_start();
include("functions/functions.php");
 ?>
<html>
<head>
<title>Shop on line</title>

<link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>

</head>

<body>
<!-- -- -- -- ---main container start here- - -- --------------------------------- -->

<div class="main_wrapper">


<!-- -- -- -- ---header start here- - -- --------------------------------- -->
<div class="header_wrapper">  


    <div id="logo">
	<a href="../index.php"/> <img  src="images/logo.jpg"/> 
			   <img  src="images/pic1.jpg"/>
			   <img  src="images/pic2.jpg"/>
			   <img  src="images/apple-logo.png"/>
			   <img  src="images/pic3.jpg"/>
			   <img  src="images/pic4.jpg"/>
			   <img src="images/pic5.jpg"/>
			  <img src="images/pic6.jpg"/>   </a>

		</div> 	 													   
</div>
<!-- -- -- -- ---header ends here- - -- --------------------------------- -->
  

<!-- -- -- -- ---navigation menu  start here- - -- --------------------------------- -->
  
  
<div class="menubar">
  <ul id="menu">
  <!-- -- -- -- ---we use ../ when the script u are trying to access is not in the folder bt back the folder - - -- --------------------------------- -->
  
     <li> <a href="../index.php">Home </a> </li>
	 <li> <a href="../all_products.php">all products </a> </li>
	 <li> <a href="my_account.php">my account </a> </li>
	 <li> <a href="#">sign up </a> </li>
	 <li> <a href="../cart.php">shopping cart</a> </li>
	 <li> <a href="#">contact us</a> </li>
  </ul>
<div id="form">
              <form action="results.php" method="get" enctype="multipart/form-data">
                 <input type="text" name="user_query" placeholder="search a product" />
                 <input type="submit" name="search" value="search" />
              </form>
</div>

</div>

<div class="content_wrapper">

   <div id="sidebar">
   
    <div id="sidebar_title">My Account:</div>
	
	
 <ul id="cats">
 <?php 
  //display the user account image
        $user = $_SESSION['customer_email'];
		
		$get_img = "select *from customer where customer_email='$user'";
		
		$run_img =mysqli_query($con, $get_img);
		
		$row_img = mysqli_fetch_array($run_img);
		
		 $c_image =  $row_img['customer_image'];
		 
		  $c_name =  $row_img['customer_name'];
		 
		 echo"<p style='text-align:center;'> <img src='customer_images/$c_image' width='150' height='150'/></p>";
 
 
 
 
 
 
 
 ?>
	<li><a href="my_account.php?my_account">My Orders</a></li>
	
	<li><a href="my_account.php?edit_account">Edit Account</a></li>
	
	<li><a href="my_account.php?change_pass">Change password</a></li>
	
	<li><a href="my_account.php?delete_account">Delete Account</a></li>
	<li><a href="logout.php">Logout</a></li>
	

   
   </ul>
   </div>

   <div id="content_area">
   
   <?php cart(); ?>
   <div id="shopping_cart">
   
        <span style="float:right; font-size:16px; padding:5px;line-height:40px;">
		 <?php
		 //display customer email if logged in else display we 'come guest
		 if(isset($_SESSION['customer_email']))
			 
		 
		 {echo "<b> Welcome:</b>" .$_SESSION['customer_email'] . "<b style='color:yellow;'> Your</b>" ; }
		 
		 else{echo "<b> Welcome Guest!</b>";}                                    ?>
		 
		 
		
		
		
		<b style="color:yellow">Shopping Cart -</b>Total Items:<?php total_item();?>  Total Price:<?php total_price();?> <a href="cart.php"
		style="color:yellow">Go to Cart  </a>
		
		<?php
		  if(!isset($_SESSION['customer_email'])){
			  
			echo " <a href='checkout.php' style='color:orange;'> Login</a>"  ;
			  
			  
		  }else{
			  
			  echo "<a href='logout.php' style='color:orange;'> Logout</a>";
		  }
		
		
		
		
		?>
		
		</span>
   
   
   
   
   </div>
   
  
   
   
     <div id="products_box">
	                                          

	<?php 
	    if(!isset($_GET['my_orders'])){
			 if(!isset($_GET['edit_account'])){
				  if(!isset($_GET['change_pass'])){
					   if(!isset($_GET['delete_account'])){
	
	echo "	<h2 style='padding:20px;'>Welcome:  $c_name  </h2>
	
	<b> You can see your orders Progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
	  
		}
		}
		}
		} ?>
		
		<?php 
		  if(isset($_GET['edit_account'])){
			include("edit_account.php");  
			  
		  }
		
		 if(isset($_GET['change_pass'])){
			include("change_pass.php");  
			  
		  }
		   if(isset($_GET['delete_account'])){
			include("delete_account.php");  
			  
		  }
		?>
	 </div>
   
   
   </div>

</div>
<!-- -- -- -- ---navigation menu  ends here- - -- --------------------------------- -->


<div id="footer">
  <h4 style="text-align:center; padding-top:30px;">&copy;2016 by www.davidecheta599.net16.net<br />
              <img style="height:30px;" src="images/social-icons.png"/>                                               </h4>

</div>
 

</div>
<!-- -- -- -- ---main container ends here- - -- --------------------------------- -->
</body>
</html>



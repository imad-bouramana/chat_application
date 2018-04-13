<?php 
   include "db.php";


   $show = "SELECT * FROM show_it ORDER BY id DESC";
   $stmt = $db->query($show);
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Show It</title>
  	<link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
  	<div class="container">
  		<h1>Show Shat</h1>
  	
  		<div class="upear">

  			<ul>
        
          <?php
          if($stmt){
           while($msg = mysqli_fetch_assoc($stmt)): ?>
      			<li><span><?=$msg['time']; ?> - </span><strong><?=$msg['user']; ?> :</strong><?=$msg['message']; ?></li>
            <hr>
      	 <?php endwhile;
         } ?>

  			</ul>
  		</div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

           <?php  
           if(isset($_GET['error'])){
           echo "<p class='error'>".$_GET['error']."</p>";
           } 

           ?>

      		<input type="text" name="user" placeholder="Enter Your Name">
      		<input type="text" name="message" placeholder="Enter Your Message">
      		<input type="submit" name="show" value="Show Shat" class="submitt">
      </form>
  	</div>
  </body>
</html>
<?php 

  if(isset($_POST['show'])){
     $user = mysqli_real_escape_string($db,$_POST['user']);
     $message = mysqli_real_escape_string($db,$_POST['message']);
     
         if(!isset($user) || $user == '' || !isset($message) || $message == ''){
                $error = 'User Or Message C\'ant Be Empty!';
                header('LOCATION: index.php?error='.$error);
       
                exit();
         }else{
           $query = "INSERT INTO show_it (user, message, time) VALUES ('$user','$message',NOW())";
           $stmt2 = $db->query($query);
           header('LOCATION: index.php');
         }
     }


?>
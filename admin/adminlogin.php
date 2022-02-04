
<?php  
session_start();  
  
?>  

<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Login</div>
    <div class="content">
      <form action="" method="POST" id="form_id">
        <div class="user-details">
        
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" required>
          </div>
         
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
            
          </div>
         
        </div>
      
        <div class="button">
          <input type="submit" value="Register" name="submit"> 
        </div>
      </form>
    </div>
  </div>
  
    <script type="text/javascript">
    $(document).click(function(){
      var form = $('#form_id');
      $ajax({

        url: form.attr("action"),
        type: 'POST',
        data: ("form_id").serialize(),
        success:function(data){
          console.log(data);
        }

      });

    });

    </script>

</body>
</html>






 <?php 
 $con =mysqli_connect('localhost','root','','joblister');
 if (isset($_POST['password'])) {
   $username =$_POST['username'];
   $password =$_POST['password'];


   $sql ="SELECT username from admin where username ='$username' AND password ='$password'";
   $result =mysqli_query($con,$sql);
   $row =mysqli_fetch_assoc($result);
   $count =mysqli_num_rows($result);
   if($count>0){
     $_SESSION['name'] = $row['username'];
     header("Location:index.php");
   }
   else {
	   echo 'unsucessful';
     header("Location:adminlogin.php");

   }
 }

 ?> 

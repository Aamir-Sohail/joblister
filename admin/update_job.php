<?php
    $con = mysqli_connect("localhost","root","","joblister");

if (isset($_GET['id'])) {
  $id =$_GET['id'];
}
   $id = (isset($_GET['id']));

    $sql = "SELECT * FROM jobs WHERE id = '$id' ";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="job_insert.php" method="post">
  <div class="container">
    <h1>Admin Insertion</h1>
    <p>New Job Insertion</p>
    <hr>

    <label for="Category_id"><b>Category_id</b></label>
    <input type="text" placeholder="Enter Category_id" name="category_id"  value="<?php echo $row['category_id'] ?>"  required>

    <label for="Company Name"><b>Company Name</b></label>
    <input type="text" placeholder="Enter Company Name" name="company"  value="<?php echo $row['company'] ?>"  required>

    <label for="Job_Title"><b>Job_Title</b></label>
    <input type="text" placeholder="Enter Job_Title" name="job_title"  value="<?php echo $row['job_title'] ?>"  required>

    <label for="Salary"><b>Salary</b></label>
    <input type="text" placeholder="Enter Salary" name="salary"  value="<?php echo $row['salary'] ?>" required>

    <label for="Description"><b>Description</b></label>
    <input type="text" placeholder="Enter Description" name="description"   value="<?php echo $row['description'] ?>" required>

    <label for="Location"><b>Location</b></label>
    <input type="text" placeholder="Enter Location" name="location"  value="<?php echo $row['location'] ?>" required>

    <label for="Contact_user"><b>Contact_user</b></label>
    <input type="text" placeholder="Enter Contact_user" name="contact_user"  value="<?php echo $row['contact_user'] ?>"  required>

    <label for="Conatact_Email"><b>Contact_Email</b></label>
    <input type="email" placeholder="Enter Contact_Email" name="contact_email"   value="<?php echo $row['contact_email'] ?>" required>

    <label for="Post_date"><b>Post_date</b></label>
    <input type="timestamp" placeholder="Enter Post_date" name="post_date"  value="<?php echo $row['post_date'] ?>"  required>







    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
  <?php
                    if (isset($_POST['submit'])) {
                      $category_id =mysqli_real_escape_string($con,$_POST['category_id']);
                      $company =mysqli_real_escape_string($con,$_POST['company']);
                      $job_title =mysqli_real_escape_string($con,$_POST['job_title']);
                      $description =mysqli_real_escape_string($con,$_POST['description']);
                      $salary =mysqli_real_escape_string($con,$_POST['salary']);
                      $location =mysqli_real_escape_string($con,$_POST['location']);
                      $contact_user =mysqli_real_escape_string($con,$_POST['contact_user']);
                      $contact_email =mysqli_real_escape_string($con,$_POST['contact_email']);
                    
                      $post_date =mysqli_real_escape_string($con,$_POST['post_date']);

                       $sql ="UPDATE jobs SET category_id ='$category_id', company='$company', job_title ='$job_title', description='$description',
                          salary ='$salary', location ='$location', contact_user ='$contact_user', contact_email ='$contact_email',
                          post_date ='$post_date'";
                        if($result)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:fetch.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                        }
                    }
                    ?>

                 


</form>

</body>
</html>
<?php
}?>
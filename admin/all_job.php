<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Data Fetch</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-md-6">
                    <h2>All Job  </h2>
                </div>
                <div class="col-md-6">
                    <a href="job_insert.php" class="btn btn-success" style="margin-left: 80%;"> ADD DATA </a>    
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <?php
                $con = mysqli_connect("localhost","root","","joblister");
               

                $sql = "SELECT * FROM jobs";
                $result = mysqli_query($con, $sql);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                
                                <th>Category_id</th>
                                <th>Company</th>
                                <th> Job_Title </th>
                                <th> Description </th>
                                <th> Salary </th>
                                <th> Location </th>
                                <th> Contact_user </th>
                                <th> Contact_Email </th>
                                <th> Post_Date </th>
                                <th> Update </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                                        
                        <?php
                        if($result)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <tr>
                                        <th> <?php echo $row['category_id']; ?> </th>
                                        <th> <?php echo $row['company']; ?> </th>
                                        <th> <?php echo $row['job_title']; ?> </th>
                                        <th> <?php echo $row['description']; ?> </th>
                                        <th> <?php echo $row['salary']; ?> </th>
                                        <th> <?php echo $row['location']; ?> </th>
                                        <th> <?php echo $row['contact_user']; ?> </th>
                                        <th> <?php echo $row['contact_email']; ?> </th>
                                        <th> <?php echo $row['post_date']; ?> </th>
                                        <th> 
                                            <form action="update_job.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form>
                                        </th>
                                        <th> 
                                            <form action="deleted.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> 
                                            </form>
                                        </th>
                                    </tr>
                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>    
                                        <th colspan="6"> No Record Found </th>
                                    </th>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
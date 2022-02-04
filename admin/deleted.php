<?php

$con = mysqli_connect("localhost","root","","joblister");


if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $sql = "DELETE FROM jobs WHERE id='$id' ";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:all_job.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>
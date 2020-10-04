<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
   
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body><br>
<?php 
    $conn = mysqli_connect('localhost','root','','students');
    $sql = "SELECT * FROM tblstudent";
    $result = mysqli_query($conn,$sql);
    

    ?>
    <form action="" method='POST'>
    <div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="panel panel-primary">
  <div class="panel-heading" align="center  ">User Information Form</div>
  <div class="panel-body">
  User Name: <input type="text" name="username" class="form-control" required><br>
  User Email: <input type="text" name="email" class="form-control" required><br>
  Contact Number: <input type="text" name="contact" class="form-control" required><br>
  Date Of Birth: <input type="date" name="dob" class="form-control" required><br>
  <div align="center">
  <input type="submit" value="Submit" name="submit" class="btn btn-success">&nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-danger">

</div>
  </div>
</div>
    </div>
    </div>
    </div>
    <?php
    if(isset($_POST['submit']))
    {
        $name=$_POST['username'];
        $usermail=$_POST['email'];
        $contact=$_POST['contact'];
        $dob=$_POST['dob'];
        $sql1="INSERT INTO tblstudent (username,useremail,contact,dob) VALUES('$name','$usermail','$contact','$dob')";
if ($conn->query($sql1) === TRUE) {
  echo "<div class='alert alert-success' role='alert'><b>Success! </b>User information Submitted Successfully. </div>";
  
} else {
  echo "<div class='alert alert-danger' role='alert'><b>Warning! </b>Please Enter Valid Information.</div>";
}

$conn->close();
}
    
    ?>

     <div>
    <table class="table table-bordered">
    <tr>
    <th>User Name</th>
    <th>User Email</th>
    <th>Contact Number</th>
    <th>Date Of Birth</th>
    </tr>
    <?php
     while ($row = mysqli_fetch_object($result)) { ?>
    <tr>
    <td><?php echo $row->username; ?></td>
    <td><?php echo $row->useremail; ?></td>
    <td><?php echo $row->contact; ?></td>
    <td><?php echo $row->dob; ?></td>
    </tr>
    
    
    <?php
     }
   
     ?>
    </table>
    </div>


    </form>
   
    
</body>
</html>
<?php
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto shadow" >
                <br>
                <h1 style="text-align:center;  "><b><i><u> SignUp Page </u></i></b></h1>
                <form action="" method="post">
                <div class="form-group">
                        <label for="" ><b>Enter Name:</b></label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="" ><b>Enter Password:</b></label>
                        <input type="password" name="pass" id="" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="" ><b>Select Image:</b></label><br>
                        <input type="file" name="image" id="" >
                    </div>
                    <div class="form-group">
                        <label for="" ><b>Status</b></label>
                        <input type="text" name="online" class="form-control" id="" placeholder="Enter status">
                    </div>
                    <div class="form-group">
                        <label for="" ><b>Current Session</b></label>
                        <input type="text" name="session" class="form-control" id="" placeholder="Enter Current Session">
                    </div>
                    <br>
                    <input type="submit" style="margin-left:42% ;" class="btn btn-primary" value="Submit" name="submit">
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $online=$_POST['online'];
    $session=$_POST['session'];
    $image_name='images/'.$_FILES['image']['name'];
    $image_type=$_FILES['image']['type'];
    $tmp_name=$_FILES['image']['tmp_name']; 

    if(strtolower($image_type)== "image/JPG" || strtolower($image_type)== "image/jpeg" ||
    strtolower($image_type)== "image/png" || strtolower($image_type)== "image/jpg" ){

            $_SESSION['name']= $name;
            $_SESSION['image']= $image_name;

    $query="insert into chat_users(username,password,avatar,online,current_session) 
    values('$name','$pass','$image_name','$online','$session')";
    $run =mysqli_query($con,$query);

    if($run){
    echo"<script> alert('Data Successfully Inserted...'); 
    window.location.href = 'login.php';
    </script>";    
    }
    else{
    echo"<script> alert('Insert Form Failed...'); </script>";
    }
}     
    else{
        echo "<script>alert('Please upload only jpy, png and jpeg image.. ')</script>";
    }
}
?>
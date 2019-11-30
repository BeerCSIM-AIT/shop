<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
       //รับข้อมูลจาก Form Signup
       include("connect.php");
       if(isset($_POST['submit'])){  //check if it is posted back
            // รับข้อมูล
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($conn->real_escape_string($_POST['password']));
            $email = $_POST['email'];

            //echo "$firstname $lastname $username $password $email";
            //insert to table
            $sqlInsert = "INSERT INTO customers (firstname, lastname, username, password,email,active) VALUES('$firstname','$lastname','$username','$password','$email','0')";

            //mysqli_query
            $result = $conn->query($sqlInsert);
            if($result){
                //เมื่อ Register สำเร็จ
                echo "<script>alert('Register Complete')</script>";
                header("Location: login.php");
            }
            else{
                echo "Error during insert: " . $conn->error;
            }

       } 
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                <div class="panel panel-info">
                
                    <div class="panel-heading text-center"> 
                        Sign up
                    </div>
                    <div class="panel-body">
                        <div class="form-group row">
                                    <label for="firstname" class="col-md-3">First name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control col-md-9" name="firstname" id="firstname">
                                    </div>
                        </div>
                        <div class="form-group row">
                                    <label for="lastname" class="col-md-3">Last name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control col-md-9" name="lastname" id="lastname">
                                    </div>
                        </div>
                        <div class="form-group row">
                                <label for="email"class="col-md-3">E-mail</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                        </div>
                        <div class="form-group row">
                                    <label for="username" class="col-md-3">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control col-md-9" name="username" id="username">
                                    </div>
                        </div>
                        <div class="form-group row">
                                <label for="password"class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-success btn-block" type="submit" name="submit">Sign up</button>
                    </div>                
                </div>
            </div>
            </form>
        </div>
    </div>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once("connect.php");
        if(isset($_POST['submit'])){
            $username = $_POST["username"];
            $password =md5($conn->real_escape_string($_POST["password"]));

            $sql = "SELECT * FROM customers WHERE username = '$username' AND password='$password'";

            $result = $conn->query($sql);

            if($result->num_rows >0){
                $row = $result->fetch_array();
                print_r($row);
                $_SESSION['id']=$row['id'];
                $_SESSION['name']= $row['firstname']. " " . $row['lastname'];
                $_SESSION['username']=$row['username'];
                
                header("Location:index.php");
            }
            else{
                echo "Incorrect username or password";
            }
        }

    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            Login to your Account
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="Username" class="col-md-3">Username</label>
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
                        <div class="panel-footer text-center">
                            <button class="btn btn-success btn-block" name="submit">Login</button>
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
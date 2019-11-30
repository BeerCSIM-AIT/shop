<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Jaidee Shop: Everything you need</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Jaidee Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Menu</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
                    if(isset($_SESSION["id"]))
                    {
                ?>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $_SESSION['name'] ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">My Profiles</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>(0)</a>
                    </li>
                <?php
                    } 
                    else{
                ?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-plus"></span> Sign Up</a></li>
                <?php
                    }
                ?>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </div>
        
    </nav>
    <div class="container">
        <div class="row">
            <form action="saveproduct.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="control-label col-md-3">Name:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtName" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label col-md-3">Description:</label>
                    <div class="col-md-9">
                        <textarea name="txtDescription" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label col-md-3">Price:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtPrice" class="form-control">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="price" class="control-label col-md-3">Stock:</label>
                    <div class="col-md-9">
                        <input type="text" name="txtStock" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="picture" class="control-label col-md-3">Product picture:</label>
                    <div class="col-md-9">
                        <input type="file" name="filePic" class="form-control-file" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
    session_start();
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
    }
    else{
        header("Location:index.php");
    }
    include("connect.php");
    $sql = "SELECT * FROM product WHERE id=$pid";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error: " . $conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd = NULL;
        }  
    }
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
            <h2 class="text-center"><?php echo $prd->name;?></h2>
            <div class="col-md-6 col-sm-12">
                <div class="thumbnail">
                    <img src="images/products/<?php echo $prd->picture;?>" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <p>Description: <?php echo $prd->description;?></p>
                <p>Price: <?php echo $prd->price;?></p>
                <p>Stock: <?php echo $prd->unitInStock;?></p>
                <p>
                    <a href="" class="btn btn-primary">Buy now!</a>
                    <a href="" class="btn btn-info">Add to basket</a>
                </p>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
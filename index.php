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
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
            <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" alt="" style="width:100%">
            </div>

            <div class="item">
            <img src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" alt="" style="width:100%">
            </div>

            <div class="item">
            <img src="https://images.unsplash.com/photo-1550645612-83f5d594b671?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80" alt="" style="width:100%">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container text-center">
        <div class="jumbotron">
            <h1>JaiDee Shop</h1>
            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, blanditiis? Libero molestias enim nobis atque autem maiores repudiandae voluptatum quos!</p>
        </div>
    </div> 
    <div class="container">
        <h2 class="text-center">Our Products 5555555</h2>
        <div class="row">
            <?php
                $sql = "SELECT * FROM product ORDER BY id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval" . $conn->error;
                }
                else{
                    //ดึงข้อมูล
                    while($prd=$result->fetch_object()){
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <a href="productdetail.php?pid=<?php echo $prd->id; ?>">
                                <img src="images/products/<?php echo $prd->picture;?>" alt="">
                            </a>
                            <div class="caption">
                                <h3><?php echo $prd->name; ?></h3>
                                <p><?php echo $prd->description; ?></p>
                                <p>
                                    <strong>Price: <?php echo $prd->price?></strong>
                                </p>
                                <p>
                                    <a href="#" class="btn btn-success">Add to basket</a>
                                    <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning">
                                        <i class="glyphicon glyphicon-pencil"></i> Edit
                                    </a>
                                    <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i> Edit
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>            
                <?php           
                    }
                }
            ?>
            
        </div>
    </div>   
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
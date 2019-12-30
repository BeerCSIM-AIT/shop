<?php
    session_start();
    include("connect.php");

    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unitInStock = $_POST['txtStock'];

    //Update picture
    $picture= $_POST['hdnProductPic'];
    if($_FILES["filePic"]["name"]!=""){
        //ถ้าอัปโหลดไฟล์เข้ามา ให้เก็บชื่อไฟล์เอาไว้ Update ด้วย
        $picture = $_FILES["filePic"]["name"];

        //Move file
        move_uploaded_file($_FILES["filePic"]["tmp_name"],"images/products/".$_FILES["filePic"]["name"]);
    }

    $sql = "UPDATE product SET name='$name', description='$description', price=$price, unitInStock=$unitInStock, picture='$picture' WHERE id = $pid";

    $result=$conn->query($sql);
    if(!$result){
        echo "Error: " . $conn->error;
    }
    else{
        header("Location:index.php");
    }


?>
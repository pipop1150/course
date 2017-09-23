<?php
$name = $_POST['name'];
$link = $_POST['link'];

$file_ext=strtolower(end(explode('.',$_FILES['slideImg']['name'])));
$target_dir = "../../assets/images/slide/";
$filename = $name.".".$file_ext;
$target_file =  $target_dir.$filename;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

include("../../application/config/config.php");
$newURL = $config["base_url"]."admin/slide.php";

if (!move_uploaded_file($_FILES["slideImg"]["tmp_name"], $target_file)) {
    echo "Sorry, there was an error uploading your file.";
    header( "refresh:5;url=".$newURL );
    exit;
}else {
    // Query
    require "../../config/database.php";
    
    $sql = "insert into image_slide(name, link, path) values('$name', '$link', 'assets/images/slide/$filename')";
    $query = mysql_query($sql, $conn);
    if (!$query) {
        echo "ERROR: update information to database error";
        header( "refresh:5;url=".$newURL );
        exit;
    }


    header('Location: '.$newURL);
}





// if(isset($_FILES['image'])){
//     $errors= array();
//     $file_name = $_FILES['image']['name'];
//     $file_size =$_FILES['image']['size'];
//     $file_tmp =$_FILES['image']['tmp_name'];
//     $file_type=$_FILES['image']['type'];
//     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
//     $expensions= array("jpeg","jpg","png");
    
//     if(in_array($file_ext,$expensions)=== false){
//         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
//     }
    
//     if($file_size > 2097152){
//         $errors[]='File size must be excately 2 MB';
//     }
    
//     if(empty($errors)==true){
//         move_uploaded_file($file_tmp,"images/".$file_name);
//         echo "Success";
//     }else{
//         print_r($errors);
//     }
// }
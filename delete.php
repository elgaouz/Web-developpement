<?php
   include "connection_BD.php";
   if(isset($_GET['deleteid'])){
    $Code=$_GET['deleteid'];

    $sql="delete from `produit` where Code=$Code";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
   }
   ?>

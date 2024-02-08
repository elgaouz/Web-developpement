<?php 
include "connection_BD.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap. min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style>
      
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        td {
            border-bottom: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            border-bottom: 2px solid black;
            padding: 2%;
            text-align: center;
            font-weight: bold;
        }
    </style>
<style>
    .button-style {
        background-color: #DCDCDC;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-style:hover {
        background-color:pink;
    }

    .button-red {
        background-color:rgb(90, 8, 66);
    }

    .button-red:hover {
        background-color: #d32f2f;
    }
    .button-style a{
        color:black;
        text-decoration: none;
    }
    .button-red a {
        color:beige; /* Changer la couleur du texte */
        text-decoration: none;
    }
</style>
</head>
<body>
    <div >
<table class="table" width="95%">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">designation</th>
      <th scope="col">prix</th>
      <th scope="col">marge</th>
      <th scope="col">qte</th>
      <th scope="col">seuil</th>
      <th scope="col">fournisseur</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <?php
     $sql="Select * from `produit`" ;
     $result=mysqli_query($conn,$sql);
     if($result){
        while($row=mysqli_fetch_assoc($result)){
            $Code=$row['Code'];
            $designation=$row['designation'];
            $prix=$row['prix'];
            $marge=$row['marge'];
            $qte=$row['qte'];
            $seuil=$row['seuil'];
            $fournisseur=$row['fournisseur'];

            echo' <tr>
            <td>'.$Code.'</td>
            <td>'.$designation.'</td>
            <td>'.$prix.'</td>
            <td>'.$marge.'</td>
            <td>'.$qte.'</td>
            <td>'.$seuil.'</td>
            <td>'.$fournisseur.'</td>
            <td>
            <button class="button-style"><a href="update.php? updateid='.$Code.'">Update</a></button>
            <button  class="button-style button-red"><a href="delete.php? deleteid='.$Code.'">Delete</a></button>
            </td>
          </tr>';
        }
     }

?>
</table>
</div>

    
</body>
</html>
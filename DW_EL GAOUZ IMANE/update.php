<?php
    include 'connection_BD.php';
    $Code=$_GET['updateid'];
    $sql="Select * from `produit` where Code=$Code";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $Code=$row['Code'];
    $designation=$row['designation'];
    $prix=$row['prix'];
    $marge=$row['marge'];
    $qte=$row['qte'];
    $seuil=$row['seuil'];
    $fournisseur=$row['fournisseur'];
    if (isset($_POST['submit'])){
      $Code=$_POST['Code'];
      $designation=$_POST['designation'];
      $prix=$_POST['prix'];
      $marge=$_POST['marge'];
      $qte=$_POST['qte'];
      $seuil=$_POST['seuil'];
      $fournisseur=$_POST['fournisseur'];

      $sql = "update `produit` set Code='$Code',designation='$designation',prix='$prix',marge='$marge',
      qte='$qte',seuil='$seuil',fournisseur='$fournisseur' where Code=$Code";
      $result=mysqli_query($conn,$sql);
       
      if($result){
        //echo"data inserted successfully";
        header('location:display.php');
      }else{
        die("Connection failed: " . mysqli_connect_error($conn));
      }
    }
    ?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap. min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>crud operation</title>
  </head>
  <body>
    <div class="container">
    <div class="ajout">
        <form method="post" action=""><br><br>
            <label for="Code">Code produit : </label>
            <input type="text"  name="Code" value=<?php echo $Code;?>>
            <br><br>
            <label for="designation">La désignation :</label>
            <input type="text"  name="designation" class="box" value=<?php echo $designation;?>><br><br>
            <label for="prix">Le prix d'achat: </label>
            <input type="text"  name="prix" class="box" value=<?php echo $prix;?>><br/><br>
            <label for="marge">La marge : </label>
            <input type="text"  name="marge" value=<?php echo $marge;?> class="box"><br/><br>
            <label for="qte">La qantité :</label>
            <input type="text"  name="qte" value=<?php echo $qte;?>  class="box"><br/><br>
            <label for="seuil">Le seuil: </label>
            <input type="text"  name="seuil" class="box" value=<?php echo $seuil;?>><br/><br>
            <label for="fournisseur">Le fournisseur : </label>
            <input type="text"  name="fournisseur" class="box" value=<?php echo $fournisseur;?>><br/><br>
            
            <input type="submit"  name="submit" class="button" value="Update" >
            <input type="reset" id="reset" class="button" value="initialiser">
        </form>
    </div>

  </body>
</html>

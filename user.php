
<?php
    include "connection_BD.php";
    if (isset($_POST['submit'])){
      $Code=$_POST['Code'];
      $designation=$_POST['designation'];
      $prix=$_POST['prix'];
      $marge=$_POST['marge'];
      $qte=$_POST['qte'];
      $seuil=$_POST['seuil'];
      $fournisseur=$_POST['fournisseur'];

      $sql = "INSERT INTO `produit` (Code,designation,prix,marge,qte,seuil,fournisseur)
       VALUES ('$Code','$designation','$prix','$marge','$qte','$seuil','$fournisseur')";
      $result=mysqli_query($conn,$sql);
       
      if($result){
        //echo"data inserted successfully";
        header('location:display.php');
      }else{
        die("Connection failed: " . mysqli_connect_error());
      }
    }
?>


<?php 
   echo '<a href="user.php? lg=Fr"><img src="Bilinguisme\france.jfif" alt="France.Gift" width="90"></a>';
   echo '<a href="user.php?lg=Ar"><img src="Bilinguisme\maroc.jfif" alt="maroc.Gift" width="90"></a>';
   echo '<a href="user.php? lg=En"><img src="Bilinguisme\usa.png" alt="Ang.Gift" width="90"></a>';
   
  if (isset ($_GET['lg'])){
    $lg=$_GET['lg'];
}
else
    $lg="Fr";

switch ($lg){
    case "Fr":
        $sens="ltr";
        include ( "const_Fr.php");
        break;
    case"En":
        $sens="ltr";
        include ( "const_An.php");
        break;
    case"Ar":
        $sens="rtl";
        include ( "const_Ar.php");
        break;
}

?>  





<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
 
</head>
<body dir=<?php echo $sens?> >
    <div class="ajout">
        <form method="post" action=""><br><br>
        <fieldset>
        <legend align="center"><?php echo TITRE1 ; ?></legend>
            <label for="Code"><?php echo LIB_Code." : " ; ?> </label>
            <input type="text"  name="Code">
            <br><br>
            <label for="designation"><?php echo LIB_DESIGNATION." : " ; ?></label>
            <input type="text"  name="designation" class="box"><br><br>
            <label for="prix"><?php echo LIB_PRIX." : " ; ?> </label>
            <input type="text"  name="prix" class="box"><br/><br>
            <label for="marge"><?php echo LIB_MARGE." : " ; ?> </label>
            <input type="text"  name="marge" class="box"><br/><br>
            <label for="qte"><?php echo LIB_QTE." : " ; ?></label>
            <input type="text"  name="qte" class="box"><br/><br>
            <label for="seuil"><?php echo LIB_SEUIL." : " ; ?> </label>
            <input type="text"  name="seuil" class="box"><br/><br>
            <label for="fournisseur"><?php echo LIB_FOURNISSEUR." : " ; ?> </label>
            <input type="text"  name="fournisseur" class="box"><br/><br>
            
            <input type="submit" name="submit"  value='<?php echo BTN_ENVOYER ;?>'>
            <input type="reset" value='<?php echo BTN_INITIALISER ;?>'>

        </fieldset>
        </form>
        
    </div>

  </body>
</html>

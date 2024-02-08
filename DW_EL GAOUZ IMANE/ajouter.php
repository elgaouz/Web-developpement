<?php
// Inclusion du fichier de connexion à la base de données
include 'connection_BD.php';

if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $Code = $_POST['Code'];
    $designation = $_POST['designation'];
    $prix = $_POST['prix'];
    $marge = $_POST['marge'];
    $qte = $_POST['qte'];
    $seuil = $_POST['seuil'];
    $fournisseur = $_POST['fournisseur'];

    // Requête d'insertion des données dans la table "produit"
    $sql = "INSERT INTO produit (Code, designation, prix, marge, qte, seuil, fournisseur)
            VALUES ('$Code', '$designation', '$prix', '$marge', '$qte', '$seuil', '$fournisseur')";

    if (mysqli_query($conn, $sql)) {
        // Redirection vers la page "display.php" en cas de succès
        header('location:display.php');
    } else {
        // Affichage de l'erreur en cas d'échec de la requête
        echo "ERROR: " . mysqli_error($conn);
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
}
?>

<?php 
// Affichage des liens de sélection de la langue
echo '<a href="user.php?lg=Fr"><img src="Bilinguisme\france.jfif" alt="France.Gift" width="90"></a>';
echo '<a href="user.php?lg=Ar"><img src="Bilinguisme\maroc.jfif" alt="maroc.jfif" width="90"></a>';
echo '<a href="user.php?lg=En"><img src="Bilinguisme\usa.PNG" alt="Ang.Gift" width="90"></a>';

if (isset($_GET['lg'])) {
    $lg = $_GET['lg'];
} else {
    $lg = "Fr";
}

switch ($lg) {
    // Sélection de la langue et inclusion du fichier de constantes correspondant
    case "Fr":
        $sens = "ltr";
        include("const_Fr.php");
        break;
    case "En":
        $sens = "ltr";
        include("const_An.php");
        break;
    case "Ar":
        $sens = "rtl";
        include("const_Ar.php");
        break;
}

?>  
<html>
<head>

</head>

<body dir="<?php echo $sens ?>"> 
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


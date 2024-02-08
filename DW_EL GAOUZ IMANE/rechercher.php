<?php
include 'connection_BD.php';

if(isset($_POST['search'])) {
    $Code = $_POST['search'];
    $query = "SELECT * FROM produit WHERE Code = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $Code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                echo "<h2>Résultats de la recherche :</h2>";
                echo "<table>";
                echo "<tr><th>Code</th><th>Désignation</th><th>Prix d'achat</th><th>Marge</th><th>Quantité</th><th>Seuil</th><th>Fournisseur</th></tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>".$row['Code']."</td><td>".$row['designation']."</td><td>".$row['prix']."</td><td>".$row['marge']."</td><td>".$row['qte']."</td><td>".$row['seuil']."</td><td>".$row['fournisseur']."</td></tr>";
                }
                echo "</table>";
            }
            else {
                echo "<p>Aucun résultat trouvé.</p>";
            }
        }
        else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    }
    else {
        echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
    }
}

?>


<html>
<head>
    <title>Rechercher un produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Rechercher un produit</h1>
    <div class="ajout">
        <form method="post" action="">
            <label for="search"><h3>Entrez le code du produit :</h3></label>
            <input type="text" name="search" class="box">
            <br><br>
            <input type="submit" id="submit" class="button" value="Rechercher">
            <input type="reset" id="reset" class="button" value="Réinitialiser">
        </form>
    </div>
</body>
</html>

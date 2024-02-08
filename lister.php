<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:rgb(90, 8, 66);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        include 'connection_BD.php';
        
        $sqlquery = "SELECT * FROM produit";
        $result = mysqli_query($conn,$sqlquery);
        
        if(mysqli_num_rows($result) > 0){
            echo "<table>
                <tr>
                    <th>Code</th>
                    <th>Désignation</th>
                    <th>Prix d'achat</th>
                    <th>Marge</th>
                    <th>Quantité</th>
                    <th>Seuil</th>
                    <th>Fournisseur</th>
                </tr>";
            
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['Code']."</td>
                        <td>".$row['designation']."</td>
                        <td>".$row['prix']."</td>
                        <td>".$row['marge']."</td>
                        <td>".$row['qte']."</td>
                        <td>".$row['seuil']."</td>
                        <td>".$row['fournisseur']."</td>
                    </tr>";
            }
            
            echo "</table>";
        }
        else{
            echo "Aucun produit trouvé.";
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>


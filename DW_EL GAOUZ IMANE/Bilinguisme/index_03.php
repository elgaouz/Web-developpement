

<html>
    <head>
        <title>Bilinguisme</title>
        <meta charset="utf-8">
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
<?php 
     echo '<a href="index_03.php?lg=Ar"><img src="maroc.jfif" alt="maroc.Gift" width="90"></a>';
     echo '<a href="index_03.php? lg=Fr"><img src="france.jfif" alt="France.Gift" width="90"></a>';
     echo '<a href="index_03.php? lg=En"><img src="usa.png" alt="Ang.Gift" width="90"></a>';
     if (isset ($_GET['lg'])) {
        $lg=$_GET['lg'];
        //echo "la langue choisie est :".$lg;
     } 
     else
         $lg="Fr";
switch($lg){
    case "Fr" :
        $sens= "ltr";
        include ("csts_Fr.php");
        break;
    case "En" :
        $sens= "ltr";
        include ("Csts_Eng.php");
        break;
        
    case "Ar" :
        $sens= "rtl";
        include ("Csts_Arab.php");
        break;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>                '

<body dir=<?php echo $sens;?>>
    <div class="form">
        <form name="test" action="test_03.php" method="post">
            <fieldset>
            <legend align="center"><?php echo TITRE1 ?></legend>
                
                <label for="Nom"><?php echo LIB_NOM." : " ; ?></label>
                <input type="text" id="Nom" name="Nom" required ><br/><br/>

                <label for="Prenom"><?php echo LIB_PRENOM." : " ; ?></label>
                <input type="text" id="Prenom" name="Prenom" required ><br/><br/>

                <label for="Age"><?php echo LIB_AGE." : " ; ?></label>
                <input type="text" id="Age" name="Age" required ><br/><br/>

                <label for="Nbfs"><?php echo LIB_NBFS." : " ; ?></label>
                <input type="text" id="Nbfs" name="Nbfs" required ><br/><br/>

                <input type="submit" name="Envoyer"  value='<?php echo BTN_ENVOYER ;?>'>

                <input type="reset" value='<?php echo BTN_INITIALISER ;?>'>

            </fieldset>
        </form>
</div>
    
</body>
</html>

       

    
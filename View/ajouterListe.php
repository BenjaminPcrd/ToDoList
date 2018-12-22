<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<a href="index.php">Retour accueil</a>

<?php
    if(isset($utilisateur)) {
        echo "<form method='post' action='?action=validerAjouterListeUtilisateur'>";
        echo "<p>";
        echo "<label> Titre de la Liste : <input type='text' name='titre' /></label><br>";
        //echo "<label> Auteur : <input type='text' name='auteur'/></label><br>";
        echo "<label> Liste privée <input type='checkbox' name='isPrive' checked></label><br>";
        echo "<input type='submit' value='Créer la liste' />";
        echo "</p>";
        echo "</form>";
        echo "<p>";
        echo $utilisateur . "<br>";
    } else {
        echo "<form method='post' action='?action=validerAjouterListe'>";
        echo "<p>";
        echo "<label> Titre de la Liste : <input type='text' name='titre' /></label><br>";
        echo "<label> Auteur : <input type='text' name='auteur'/></label><br>";
        echo "<input type='submit' value='Créer la liste' />";
        echo "</p>";
        echo "</form>";
        echo "<p>";
    }



    ?>

    <?php
    if(isset($message)) {
        echo $message;
    }
    ?>
</p>

</body>
</html>


<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<a href="index.php">Retour accueil</a>


<form method='post' action='?action=validerAjouterListe'>
<p>
    <h1>FAIRE AJOUTER LISTE PRIVEE</h1>
    <label> Titre de la Liste : <input type="text" name="titre" /></label><br>
    <label> Auteur : <input type="text" name="auteur"/></label><br>
    <input type="submit" value="Créer la liste" />
</p>
</form>
<p>

    <?php
    if(isset($utilisateur)) {
        echo $utilisateur;
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


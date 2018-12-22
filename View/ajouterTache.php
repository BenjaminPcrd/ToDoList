<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<a href="index.php">Retour accueil</a>

<?php
echo "<form method='post' action='?action=validerAjouterTache&listeId=" . $_REQUEST['listeId'] . "'>";
?>
    <p>
        <label> Titre de la tache : <input type="text" name="titre" /></label><br>
        <label> Description de la tache : <textarea name="description" rows="1" cols="45"></textarea></label><br>
        <input type="submit" value="Créer la tâche" />
    </p>
</form>

</body>
</html>


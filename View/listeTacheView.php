<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<a href="index.php">Retour accueil</a>
<?php
global $vues;
if(isset($listeTache)) {
    echo "<ul>";
    foreach($listeTache as $tache) {
        if($tache['checked']) {
            echo "<s><li><h3>" . $tache['titre'] . "</h3>";
            echo $tache['description'] . "</s>";
            echo "<form method='post' action='?action=annulerTache&tacheId=" . $tache['tacheId'] . "&listeId=" . $tache['listeId'] . "'>";
            echo "<input type ='submit' value='annuler la tâche'/>";
            echo "</form></li>";
        } else {
            echo "<li><h3>" . $tache['titre'] . "</h3>"  ;
            echo $tache['description'];
            echo "<form method='post' action='?action=validerTache&tacheId=" . $tache['tacheId'] . "&listeId=" . $tache['listeId'] . "'>";
            echo "<input type ='submit' value='valider la tâche'/>";
            echo "</form></li>";
        }
    }
    echo "</ul>";
}
echo "<form method='post' action='?action=modifierListe&listeId=" . $_REQUEST['listeId'] .  "'>";
echo "<input type ='submit' value='Modifier la liste'/>";
echo "</form>";


?>
</body>
</html>


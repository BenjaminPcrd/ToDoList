<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<a href="index.php">Retour accueil</a>
<?php
global $vues;
echo "<ul>";
if(isset($listeTache)) {
    foreach($listeTache as $tache) {
        echo "<li>";
        echo "<h3>" . $tache['titre'] . "</h3>"  ;
        echo $tache['description'] . "<br>";
        echo "<form method='post' action='?action=supprimerTache&tacheId="  . $tache['tacheId'] . "&listeId=" . $_REQUEST['listeId'] . "'>";
        echo "<input type ='submit' value='Supprimer la tâche'/>";
        echo "</form></li>";
    }
}

echo "<li><form method='post' action='?action=ajouterTache&listeId=" . $_REQUEST['listeId'] . "'>";
echo "<input type ='submit' value='Ajouter une tâche'/>";
echo "</li></form>";
echo "</ul>";

echo "<form method='post' action='?action=cliqueListe&listeId=" . $_REQUEST['listeId'] . "'>";
echo "<input type ='submit' value='Terminer la modification'/>";
echo "</form>";

echo "<form method='post' action='?action=supprimerListe&listeId=" . $_REQUEST['listeId'] . "'>";
echo "<input type ='submit' value='Supprimer la liste'/>";
echo "</form>";






?>
</body>
</html>


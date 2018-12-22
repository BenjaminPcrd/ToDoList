<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<h1>To Do List</h1>
<?php
global $vues;
if(isset($listes)) {
    echo "<h2>Listes publiques</h2>";
    echo "<ul>";
    foreach($listes as $liste) {
        if (!$liste['private']) {
            echo "<li><a href='index.php?action=cliqueListe&listeId=" . $liste['id'] . "'>" . $liste['nom'] . "</a>";
            echo " crée par " . $liste['auteur'] . "<br></li>";
        }
    }
    echo "<li><form action='?action=ajouterListe' method='post'>";
    echo "<input type='submit' value='Créer une nouvelle liste'/>";
    echo "</form></li>";
    echo "</ul>";
    if (isset($utilisateur)) {
        echo "<h2>Listes privées</h2>";
        echo "<ul>";
        foreach($listes as $liste) {
            if ($liste['private']) {
                echo "<li><a href='index.php?action=cliqueListePrive&listeId=" . $liste['id'] . "'>" . $liste['nom'] . "</a>";
                echo " crée par " . $liste['auteur'] . "<br></li>";
            }
        }
        echo "<li><form action='?action=ajouterListePrive' method='post'>";
        echo "<input type='submit' value='Créer une nouvelle liste privée'/>";
        echo "</form></li>";
        echo "</ul>";
    }
}


if(isset($utilisateur)) {
    echo $utilisateur;
    echo "<form action='?action=deconnection' method='post'>";
    echo "<p>";
    echo "<input type='submit' value='Déconnection'/>";
    echo "</p>";
    echo "</form>";
} else {
    echo "<form action='?action=inscription' method='post'>";
    echo "<p>";
    echo "<input type='submit' value='Inscription'/>";
    echo "</p>";
    echo "</form>";
    echo "<form action='?action=connection' method='post'>";
    echo "<p>";
    echo "<input type='submit' value='Connection'/>";
    echo "</p>";
    echo "</form>";
}
?>



</body>
</html>


<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<a href="index.php">Retour accueil</a>

<p>
<form method='post' action='?action=validerConnection'>
    <label>Pseudo : <input type="text" name="login"/></label><br/>
    <label>Mot de passe : <input type="password" name="password1"/></label><br/>
    <input type="submit" value="Me connecter"/>
</form>
</p>
<p>
    <?php
    if(isset($message)) {
        echo $message;
    }
    ?>
</p>

</body>
</html>


<?php

class Model {
    public static function getListesPublique() {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->toutesLesListesPubliques();
    }

    public static function getTachesPublique($id) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->listeTachePublique($id);
    }

    public static function validerTache($tacheId){
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->validerTache($tacheId);
    }

    public static function annulerTache($tacheId){
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->annulerTache($tacheId);
    }

    public static function ajouterTachePublic($listeId, $titre, $description) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->ajouterTachePublic($listeId, $titre, $description);
    }

    public static function supprimerTachePublic($tacheId) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->supprimerTachePublic($tacheId);
    }

    public static function inscription($login, $password_hash, $email) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->inscription($login, $password_hash, $email);
    }

    public static function recupUser($login) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->recupUser($login);
    }

    public static function connection($login) {
        $_SESSION['role'] = 'Utilisateur connecté';
        $_SESSION['login'] = $login;
    }

    public static function deconnection() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isConnecte() {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $login = $_SESSION['login']; //Validation::nettoyer_string($_SESSION['login']);
            $role = $_SESSION['role']; //Validation::nettoyer_string($_SESSION['role']);
            return new User($login, $role);
        } else {
            return null;
        }
    }

    public static function isListePrive($listeId) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->isListePrive($listeId);
    }

    public static function ajouterListe($titre, $auteur) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->ajouterListe($titre, $auteur);
    }

    public static function supprimerListe($listeId) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->supprimerListe($listeId);
    }
}
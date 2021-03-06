<?php

class ModelUtilisateur {
    public static function getListesPrive($login) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->toutesLesListesUtilisateur($login);
    }

    public static function getTachesPrive($listeId) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        return $toDoListGateway->listeTachePrive($listeId);
    }

    public static function ajouterListeUtilisateur($titre, $auteur, $isPrive) {
        $toDoListGateway = new ToDoListGateway(new Connexion('mysql:host=localhost;dbname=maBase;charset=utf8', 'benjam', '123'));
        $toDoListGateway->ajouterListeUtilisateur($titre, $auteur, $isPrive);
    }
}
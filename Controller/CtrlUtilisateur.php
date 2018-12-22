<?php

class CtrlUtilisateur {
    public function __construct() {
        global $vues;
        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case null:
                    $this->pagePrinc();
                    break;
                case "deconnection":
                    $this->deconnection();
                    break;
                case "ajouterListePrive":
                    $this->ajouterListePrive();
                    break;
                case "cliqueListePrive":
                    $this->pageListePrive();
                    break;
            }
        } catch(PDOException $e) {
            $TMESS = ["Exception PDO"];
            require($vues['errorView']);
        } catch(Exception $e) {
            $TMESS = ["Exception"];
            require($vues['errorView']);
        }
    }

    public function pagePrinc() {
        global $vues;
        $utilisateur = Model::isConnecte();
        $listes = ModelUtilisateur::getListesPrive($utilisateur->getLogin());
        require($vues['mainView']);
    }

    public function deconnection() {
        Model::deconnection();
        $_REQUEST['action'] = null;
        new CtrlVisiteur();
    }

    public function pageListePrive() {
        global $vues;
        $listeTache = ModelUtilisateur::getTachesPrive($_REQUEST['listeId']);
        require($vues['listeTacheView']);
    }

    public function ajouterlistePrive() {
        global $vues;
        $utilisateur = Model::isConnecte();
        require($vues['ajouterListe']);
    }
}
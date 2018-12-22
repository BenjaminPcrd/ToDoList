<?php

class FrontCtrl {
    public function __construct() {
        $actionVisiteur = array("cliqueListe", "validerTache", "annulerTache", "modifierListe", "supprimerTache", "ajouterTache", "validerAjouterTache", "inscription", "connection", "validerInscription", "validerConnection", "ajouterListe", "validerAjouterListe", "supprimerListe");
        $actionUtilisateur = array("deconnection", "ajouterListePrive", "cliqueListePrive", "validerAjouterListeUtilisateur");
        session_start();
        try {
            $utilisateur = Model::isConnecte();
            $action = $_REQUEST['action'];
            if ($action == null) {
                if ($utilisateur) {
                    new CtrlUtilisateur();
                } else {
                    new CtrlVisiteur();
                }
            }

            if (in_array($action, $actionUtilisateur)) {
                if ($utilisateur == null) {
                    global $vues;
                    $message = "Connectez-vous pour acceder à cette fonctionnalité";
                    require($vues['connection']);
                } else {
                    new CtrlUtilisateur();
                }
            }

            if (in_array($action, $actionVisiteur)) {
                new CtrlVisiteur();
            }

        } catch (Exception $e) {
            echo $e;
        }
    }
}
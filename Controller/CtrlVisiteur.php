<?php

class CtrlVisiteur {
    public function __construct() {
        global $vues;
        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case null:
                    $this->pagePrinc();
                    break;
                case "cliqueListe":
                    $this->pageListePublique();
                    break;
                case "validerTache":
                    $this->validerTache();
                    break;
                case "annulerTache":
                    $this->annulerTache();
                    break;
                case "modifierListe":
                    $this->modifierListe();
                    break;
                case "supprimerTache":
                    $this->supprimerTache();
                    break;
                case "ajouterTache":
                    $this->ajouterTache();
                    break;
                case "validerAjouterTache":
                    $this->validerAjouterTache();
                    break;
                case "inscription":
                    $this->inscription();
                    break;
                case "connection":
                    $this->connection();
                    break;
                case "validerInscription":
                    $this->validerInscription();
                    break;
                case "validerConnection":
                    $this->validerConnection();
                    break;
                case "ajouterListe":
                    $this->ajouterListe();
                    break;
                case "validerAjouterListe":
                    $this->validerAjouterListe();
                    break;
                case "supprimerListe":
                    $this->supprimerListe();
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
        $listes = Model::getListesPublique();
        $utilisateur = Model::isConnecte();
        require($vues['mainView']);
    }

    public function pageListePublique() {
        global $vues;
        $isListePrive = Model::isListePrive($_REQUEST['listeId']);
        $utilisateur = Model::isConnecte();
        if ($isListePrive && $utilisateur != null) {
            $listeTache = ModelUtilisateur::getTachesPrive($_REQUEST['listeId']);
        } else {
            $listeTache = Model::getTachesPublique($_REQUEST['listeId']);
        }
        require($vues['listeTacheView']);
    }

    public function validerTache() {
        Model::validerTache($_REQUEST['tacheId']);
        $this->pageListePublique();
    }

    public function annulerTache() {
        Model::annulerTache($_REQUEST['tacheId']);
        $this->pageListePublique();
    }

    public function modifierListe() {
        global $vues;
        $utilisateur = Model::isConnecte();
        $isListePrive = Model::isListePrive($_REQUEST['listeId']);
        if ($isListePrive) {
            $listeTache = ModelUtilisateur::getTachesPrive($_REQUEST['listeId']);
        } else {
            $listeTache = Model::getTachesPublique($_REQUEST['listeId']);
        }
        require($vues['modifListeTaches']);
    }

    public function supprimerTache() {
        Model::supprimerTachePublic($_REQUEST['tacheId']);
        $this->modifierListe();
    }

    public function ajouterTache() {
        global $vues;
        require($vues['ajouterTache']);
    }

    public function validerAjouterTache() {
        Model::ajouterTachePublic($_REQUEST['listeId'], $_REQUEST['titre'], $_REQUEST['description']);
        $this->modifierListe();
    }

    public function inscription() {
        global $vues;
        require($vues['inscription']);
    }

    public function connection() {
        global $vues;
        require($vues['connection']);
    }

    public function validerInscription() {
        global $vues;
        if (count($_POST)>0 && empty($_POST['login'])) {
            $message = "Le pseudo doit être renseigné";
            require($vues['inscription']);
        } else if (count($_POST)>0 && empty($_POST['password1'])) {
            $message = "Le mot de passe doit être renseigné";
            require($vues['inscription']);
        }else if (count($_POST)>0 && $_POST['password1'] != $_POST['password2']) {
            $message = "Les deux mots de passes ne correspondent pas";
            require($vues['inscription']);
        }else if (count($_POST)>0 && empty($_POST['email'])) {
            $message = "L'adresse email doit être renseignée";
            require($vues['inscription']);
        } else {
            $login = $_POST['login'];
            $password_hash = password_hash($_POST['password2'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $user = Model::recupUser($login);
            if($user != null) {
                $message = "Pseudo déjà utilisé";
                require($vues['inscription']);
            } else {
                Model::inscription($login, $password_hash, $email);
                $message = "Inscription réussie";
                require($vues['connection']);
            }
        }
    }

    public  function validerConnection() {
        global $vues;
        if (count($_POST)>0 && empty($_POST['login'])) {
            $message = "Le pseudo doit être renseigné";
            require($vues['connection']);
        } else if (count($_POST)>0 && empty($_POST['password1'])) {
            $message = "Le mot de passe doit être renseigné";
            require($vues['connection']);
        } else {
            $login = $_POST['login'];
            $password = $_POST['password1'];
            $user = Model::recupUser($login);
            $isPasswordCorrect = password_verify($password, $user['password']);
            if(!$isPasswordCorrect) {
                $message = "Pseudo ou mot de passe incorrect";
                require($vues['connection']);
            } else {
                Model::connection($user['login']);
                $_REQUEST['action'] = null;
                new CtrlUtilisateur();
            }
        }
    }

    public function ajouterListe() {
        global $vues;
        require($vues['ajouterListe']);
    }

    public function validerAjouterListe() {
        global $vues;
        if (count($_POST)>0 && empty($_POST['titre'])) {
            $message = "Le titre de la liste doit être renseigné";
            require($vues['ajouterListe']);
        } else if (count($_POST)>0 && empty($_POST['auteur'])) {
            $message = "L'auteur de la liste doit être renseigné";
            require($vues['ajouterListe']);
        } else {
            $user = Model::recupUser($_POST['auteur']);
            if($user != null) {
                $message = "Ce nom est déjà utilisé";
                require($vues['ajouterListe']);
            } else {
                $titre = $_POST['titre'];
                $auteur = $_POST['auteur'];
                Model::ajouterListe($titre, $auteur);
                $this->pagePrinc();
            }
        }
    }

    public function supprimerListe() {
        Model::supprimerListe($_REQUEST['listeId']);
        $this->pagePrinc();
    }
}
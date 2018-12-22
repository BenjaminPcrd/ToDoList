<?php

class ToDoListGateway {
    private $bd;

    public function __construct(Connexion $bd) {
        $this->bd = $bd;
    }

    public function toutesLesListesPubliques() {
        $query = 'Select * From ToDoList Where private = :bool';
        $this->bd->executeQuery($query, array(':bool' => array(false, PDO::PARAM_BOOL)));
        $result = $this->bd->getResults();
        foreach($result as $liste) {
            $listes[] = $liste;
        }
        return $listes;
    }

    public function listeTachePublique($id) {
        $query = 'Select * From Tache, ToDoList Where Tache.listeId = ToDoList.id And Tache.listeId = :id And ToDoList.private = :bool;';
        $this->bd->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT),
                                              ':bool' => array(false, PDO::PARAM_BOOL)));
        $result = $this->bd->getResults();
        foreach($result as $tache) {
            $liste[] = $tache;
        }
        return $liste;
    }

    public function listeTachePrive($listeId) {
        $query = 'Select * From Tache, ToDoList Where Tache.listeId = ToDoList.id And Tache.listeId = :listeId And ToDoList.private = :bool;';
        $this->bd->executeQuery($query, array(':listeId' => array($listeId, PDO::PARAM_INT),
                                              ':bool' => array(true, PDO::PARAM_BOOL)));
        $result = $this->bd->getResults();
        foreach($result as $tache) {
            $liste[] = $tache;
        }
        return $liste;
    }

    public function validerTache($tacheId) {
        $query = 'Update Tache Set checked=1 Where tacheId=:tacheId;';
        $this->bd->executeQuery($query, array(':tacheId' => array($tacheId, PDO::PARAM_INT)));
    }

    public function annulerTache($tacheId) {
        $query = 'Update Tache Set checked=0 Where tacheId=:tacheId;';
        $this->bd->executeQuery($query, array(':tacheId' => array($tacheId, PDO::PARAM_INT)));
    }

    public function ajouterTachePublic($listeId, $titre, $description) {
        $query = 'Insert Into Tache Values(null, :listeId, :titre, :description, :bool);';
        $this->bd->executeQuery($query, array(':listeId' => array($listeId, PDO::PARAM_INT),
                                              ':titre' => array($titre, PDO::PARAM_STR),
                                              ':description' => array($description, PDO::PARAM_STR),
                                              ':bool' => array(false, PDO::PARAM_BOOL)));
    }

    public function supprimerTachePublic($tacheId) {
        $query = 'Delete From Tache Where tacheId=:tacheId;';
        $this->bd->executeQuery($query, array(':tacheId' => array($tacheId, PDO::PARAM_INT)));
    }

    public function inscription($login, $password_hash, $email) {
        $query = 'Insert Into User Values(null, :login, :password_hash, :email);';
        $this->bd->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR),
                                              ':password_hash' => array($password_hash, PDO::PARAM_STR),
                                              ':email' => array($email, PDO::PARAM_STR)));
    }

    public function recupUser($login) {
        $query = 'Select * From User Where login=:login;';
        $this->bd->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)));
        $result = $this->bd->getResults();
        foreach($result as $rows) {
            $user = $rows;
        }
        return $user;
    }

    public function ajouterListe($titre, $auteur) {
        $query = 'Insert Into ToDoList Values(null, :nom, :auteur, :bool);';
        $this->bd->executeQuery($query, array(':nom' => array($titre, PDO::PARAM_STR),
                                              ':auteur' => array($auteur, PDO::PARAM_STR),
                                              ':bool' => array(false, PDO::PARAM_BOOL)));
    }

    public function supprimerListe($listeId) {
        $query = 'Delete From Tache Where listeId=:listeId;';
        $this->bd->executeQuery($query, array(':listeId' => array($listeId, PDO::PARAM_STR)));

        $query = 'Delete From ToDoList Where id=:listeId;';
        $this->bd->executeQuery($query, array(':listeId' => array($listeId, PDO::PARAM_STR)));
    }

    public function toutesLesListesUtilisateur($login) {
        $query = 'Select * From ToDoList Where private = :bool1 Union Select * from ToDoList Where private = :bool2 and auteur = :login;';
        $this->bd->executeQuery($query, array(':bool1' => array(false, PDO::PARAM_BOOL),
                                              ':bool2' => array(true, PDO::PARAM_BOOL),
                                              ':login' => array($login, PDO::PARAM_STR)));
        $result = $this->bd->getResults();
        foreach($result as $liste) {
            $listes[] = $liste;
        }
        return $listes;
    }
}
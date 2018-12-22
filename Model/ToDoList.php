<?php

class ToDoList {
    private $nom;
    private $auteur;
    private $taches;

    public function __construct($nom, $auteur) {
        $this->nom = $nom;
        $this->auteur = $auteur;
        $this->taches = array();
    }

    public function ajouterTache($tache) {
        array_push($this->taches, $tache);
    }

    public function getTaches() {
        return $this->taches;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAuteur() {
        return $this->auteur;
    }
}
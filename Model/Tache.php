<?php

class Tache {
    private $titre;
    private $descritpion;

    public function __construct($titre, $descritpion) {
        $this->titre = $titre;
        $this->descritpion = $descritpion;
    }
}
<?php

class User {
    private $login;
    private $role;

    public function __construct($login, $role) {
        $this->login = $login;
        $this->role = $role;
    }

    public function __toString() {
        return $this->role . " : " . $this->login;
    }

    public function getLogin() {
        return $this->login;
    }




}
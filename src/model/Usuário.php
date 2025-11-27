<?php

class Usuário{
    private $nomeUser;
    private $senha;
    private $email;

    //Construtor
    function __construct($nomeUser, $senha, $email){
        $this->nomeUser = $nomeUser;
        $this->senha = $senha;
        $this->email = $email;
    }

    //Get e Set

    //NomeUser
    public function getNomeUser(){
        return $this->nomeUser;
    }
    public function setNomeUser($nomeUser){
        $this->nomeUser = $nomeUser;
    }

    //senha
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    //Email
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
}
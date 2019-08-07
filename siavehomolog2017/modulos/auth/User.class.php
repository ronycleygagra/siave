<?php
/**
 * Classe que implementa um usujário de rede AD
 * @name $globalVariableName 
 * @author Ronycley Gonçalves Agra - suportecg@sebraepb.com.br
 * @since 30/01/2017
 * @version "1.0"
 */

class User{
    
    private $nome = null;
    private $login = null;
    
    function __construct($nome, $login) {
        $this->nome = $nome;
        $this->login = $login;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }
}


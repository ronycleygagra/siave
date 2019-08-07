<?php
/**
 * Classe que realização a autenticação no AD
 * @name $globalVariableName 
 * @author Ronycley Gonçalves Agra - suportecg@sebraepb.com.br
 * @since 30/01/2017
 * @version "1.0"
 */
class Auth {
    
    private $login = null;
    private $senha = null;
    private $host = null;
    private $port = null;
    private $dominio = null;
    
    function __construct($login, $senha, $host, $port, $dominio) {
        $this->login = $login;
        $this->senha = $senha;
        $this->host = $host;
        $this->port = $port;
        $this->dominio = $dominio;
    }
    
    public function antentica(){
        $connection = ldap_connect($this->host, $this->port);
        if ($connection) {
            if (@ldap_bind($connection, $this->login.$this->dominio, $this->senha)) {
                return true;
            }
        }
        return false;
    }
    
    public function getUser(){
        return new User($this->login.$this->dominio,$this->login.$this->dominio);  
    }
    
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getHost() {
        return $this->host;
    }

    function getPort() {
        return $this->port;
    }

    function getDominio() {
        return $this->dominio;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setPort($port) {
        $this->port = $port;
    }

    function setDominio($dominio) {
        $this->dominio = $dominio;
    }
}

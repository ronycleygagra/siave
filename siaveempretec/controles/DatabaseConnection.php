<?php
/**
 * Classe estabele uma conexão com o banco de dados
 * @name $globalVariableName 
 * @author Ronycley Gonçalves Agra - suportecg@sebraepb.com.br
 * @since 23/01/2017
 * @version "1.0"
 * @uses Classe PDO
 */

class DatabaseConnection {
    
    /**
     * Ip do servirdor
     * @var String 
     */
    private $hostname = "10.16.4.39";
    /**
     * O nome do bando de dados
     * @var String 
     */
    private $dbname = "siacnet";
    /**
     * O usuário da conexão
     * @var String 
     */
    private $username = "ativaweb";
    /**
     * A senha do usuário da conexão
     * @var String 
     */
    private $pw = "Jve!2009";
    /**
     * A váriável PDO
     * @var String 
     */
    private $pdo = null;

    /**
     * Método Construtor
     * @var String 
     */
    function __construct() {
        $this->pdo = new PDO("dblib:host=$this->hostname;dbname=$this->dbname", "$this->username", "$this->pw");
    }

    /**
     * Execute uma query sql
     * @var String A query sql a ser executada
     * @return PDOStatement Retorna um PDOStatement para uma operação fecth
     */
    public function query($sql){
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query;
    }

}//DatrbaseConnection

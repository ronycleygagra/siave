<?php
class Auth {

    public static function login($login, $senha) {
        $usuario["autenticado"] = false;
        
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $ldaphost = 'ldap://10.16.4.9';
        $ldapport = 389;

        $ldapconn = ldap_connect($ldaphost, $ldapport);
        if ($ldapconn) {
            $username = $login . "@pb.sebrae.corp";
            $upasswd = $senha;
            if (@ldap_bind($ldapconn, $username, $upasswd)) {
                $usuario["autenticado"] = true;
                $usuario["nome"] = $username;
            } 
        }
        return $usuario;
    }
}
?>
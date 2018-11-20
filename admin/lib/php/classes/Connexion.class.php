<?php
//singleton : à tout moment , un seul ovbjet ne peut exister
class Connexion {

    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {
        // :: = appel à une var ou fct statique  

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                //fournit un attribut de rapport d'erreur (ATTR_ERRMODE) et 
                //d'exception (ERRMODE_EXCEPTION)
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);               
                
            } catch (PDOException $e) {
                print "Erreur de connexion : ".$e->getMessage();
                print "pass : ".$pass. " user = ".$user;
            }
        }
        return self::$_instance;
    }
}
?>
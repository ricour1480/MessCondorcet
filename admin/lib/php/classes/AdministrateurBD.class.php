<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministrateurBD
 *
 * @author ricou
 */
class AdministrateurBD extends Administrateur {
    private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    public function verifAdmin(string $login,string $mdp){
         try {
            $query="SELECT * FROM admin WHERE login=:login and mdp=:pwd";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->bindParam(':pwd',$mdp,PDO::PARAM_STR);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if($data != null){
                return $data;
            }else{
                return null;;
            }
        } catch(PDOException $e) {
            print $e->getMessage();
        }
           
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilisateursBD
 *
 * @author ricou
 */
class UtilisateursBD extends Utilisateurs {
     private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    public function AjoutUtilisateur($nom,$prenom,$login,$mdp,$credit){
        try{
            $insert="INSERT INTO utilisateur(nom,prenom,login,password,credit,status)VALUES(:nom,:prenom,:login,:mdp,:credit,1)";
            $resutlset= $this->_db->prepare($insert);
            $resutlset->bindParam(':nom',$nom,PDO::PARAM_STR);
            $resutlset->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $resutlset->bindParam(':login',$login,PDO::PARAM_STR);
            $resutlset->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $resutlset->bindParam(':credit',$credit);
            $resutlset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
          $data=$resutlset->fetch();
        return $data;
    }
    public function UpdatePassword($login,$new_password){
        try{
            $update="UPDATE utilisateur SET password=:newpassword WHERE login=:login";
            $resultset=$this->_db->prepare($update);
            $resultset->bindParam(':newpassword',$new_password,PDO::PARAM_STR);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
        $data=$resultset->fetch();
        return $data;
    }
    public function getIdUser($login) {
        try {
            $query="SELECT id_user FROM utilisateur WHERE login=:login";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
            $data=$resultset->fetchAll();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
       
        return $data;        
    }
    public function verifUser(string $login,string $mdp) {
        try {
            $query="SELECT * FROM utilisateur WHERE login=:login and password=:pwd";
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

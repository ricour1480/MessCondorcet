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
    public function getAllInfo(string  $login){
         try {
            $query="SELECT * FROM utilisateur WHERE login=:login";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if($data != null){
                return $data;
            }else{
                return null;
            }
        } catch(PDOException $e) {
            print $e->getMessage();
        }
    }
    public function updateCreditUser($login,$newcredit){
        try{
            $update="UPDATE utilisateur set credit=:newcredit where login=:login";
            $resultset = $this->_db->prepare($update);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
             $resultset->bindParam(':newcredit',$newcredit,PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function getAllUser(){
        try{
            $query="SELECT * FROM utilisateur ORDER BY nom asc";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if($data != null){
                return $data;
            }else{
                return null;
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function getLoginCredit($userid){
        try{
             $query="SELECT login,credit FROM utilisateur WHERE id_user=:iduser";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':iduser',$userid,PDO::PARAM_INT);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if($data != null){
                return $data;
            }else{
                return null;
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function searchUser($mot){
        $rechercher2='%'.$mot.'%';
        $rechercher3='%'.$mot.'%';
        try{
            $query="SELECT * FROM utilisateur WHERE nom=:nom OR prenom=:prenom";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':nom',$rechercher2,PDO::PARAM_STR);
            $resultset->bindParam(':prenom',$rechercher3,PDO::PARAM_STR);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if($data != null){
                return $data;
            }else{
                return null;
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}

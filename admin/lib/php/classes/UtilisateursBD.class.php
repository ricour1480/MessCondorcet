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
    public function AjoutUtilisateur(string $nom,string $prenom,string $login,string $mdp, float $credit){
        try{
            $insert="INSERT INTO utilisateur(nom,prenom,login,password,credit)VALUES(:nom,:prenom,:login,:mdp,:credit)";
            $resutlset= $this->_db->prepare($insert);
            $resutlset->bindParam(':nom',$nom,PDO::PARAM_STR);
            $resutlset->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $resutlset->bindParam(':login',$login,PDO::PARAM_STR);
            $resutlset->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $resutlset->bindParam(':credit',$credit);
            $resutlset->execute();
             /**Je vérifie si il a bien inseré**/
            if($resutlset->rowCount()>0){
                print "Insertion éffectué";
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function UpdatePassword(string $login,string $new_password){
        try{
            $update="UPDATE utilisateur SET password=:newpassword WHERE login=:login";
            $resultset=$this->_db->prepare($update);
            $resultset->bindParam(':newpassword',$new_password,PDO::PARAM_STR);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
            if($resultset->rowCount()>0){
                print "Insertion éffectué";
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function getDonneesUser(string $login) {
        try {
            $query="SELECT * FROM utilisateur WHERE login=:login";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){            
            try {
                $_userArray[] = new Utilisateurs($data);

            } catch(PDOException $e) {
                
                print $e->getMessage();
            }            
        }
        return $_userArray;        
    }
    public function verifUser(string $login,string $mdp) {
        try {
            $query="SELECT count(*) FROM utilisateur WHERE login=:login and password=:pwd";
            $resultset = $this->_db->prepare($query);
            $resultset->bindParam(':login',$login,PDO::PARAM_STR);
            $resultset->bindParam(':pwd',$mdp,PDO::PARAM_STR);
            $resultset->execute();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){            
            try {
                $_userArray[] = new Utilisateurs($data);

            } catch(PDOException $e) {
                
                print $e->getMessage();
            }            
        }
        return $_userArray;        
    }
}

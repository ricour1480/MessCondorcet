<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeUserBD
 *
 * @author ricou
 */
class CommandeUserBD extends CommandeUser {
    private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }    
    public function Commander($id_user,$id_produit,$date,$statut,$qte){
        try{
        $commande="INSERT INTO commande(id_user,id_produit,date,statut,qte) VALUES (:id_user,:id_produit,:date,:status,:qte)";
        $resultset=$this->_db->prepare($commande);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->bindParam(':id_produit',$id_produit,PDO::PARAM_INT);
        $resultset->bindParam(':date',$date,PDO::PARAM_STR);
        $resultset->bindParam(':status',$statut,PDO::PARAM_STR);
        $resultset->bindParam(':qte',$qte,PDO::PARAM_INT);
        $resultset->execute();
        $data=$resultset->fetchAll();
        } catch (PDOException $e){
            print $e->getMessage();
        }
    }
    public function AffichageCommande($id_user){
        try{
        $query="SELECT id_produit,qte FROM commande WHERE id_user=:id_user";
        $resultset=$this->_db->prepare($query);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        } 
        while($data = $resultset->fetch()){            
            try {
                $_CommandeArray[] = new CommandeUser($data);

            } catch(PDOException $e) {
                
                print $e->getMessage();
            }            
        }
        return $_CommandeArray;   
    }
    public function UpdateQte($id_user,$id_prod,$qte){
        try{
        $commande="update commande set qte=:newqte where id_user=:id_user and id_produit=:id_prod";
        $resultset=$this->_db->prepare($commande);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
        $resultset->bindParam(':newqte',$qte,PDO::PARAM_INT);
        $resultset->execute();
        } catch (PDOException $e){
            print $e->getMessage();
        }
    }
    public function UpdateStatut($id_user,$id_prod,$statut){
        try{
        $update="update commande set statut=:newstatut where id_user=:id_user and id_produit=:id_prod ";
        $resultset=$this->_db->prepare($update);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
        $resultset->bindParam(':newstatut',$statut,PDO::PARAM_INT);
        $resultset->execute();
        } catch (PDOException $e){
            print $e->getMessage();
        }
    }
    public function DeleteCommande($id_user,$id_prod){
        try{
        $update="delete from commande where id_user=:id_user and id_produit=:id_prod ";
        $resultset=$this->_db->prepare($update);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
        $resultset->execute();
        } catch (PDOException $e){
            print $e->getMessage();
        }
    }
    public function AffichageCommandeQte($id_user,$id_prod){
        try{
        $select="select qte from commande where id_user=:id_user and id_produit=:id_prod ";
        $resultset=$this->_db->prepare($select);
        $resultset->bindParam(':id_user',$id_user,PDO::PARAM_INT);
        $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
        $resultset->execute();
        $data= $resultset->fetchAll();
        } catch (PDOException $e){
            print $e->getMessage();
        }
        return $data;
    }
}

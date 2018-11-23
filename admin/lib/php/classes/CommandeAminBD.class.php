<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeAminBD
 *
 * @author ricou
 */
class CommandeAminBD {
     private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }    
    public function Commander($idadmin,$idprod,$date,$reçu,$qte){
        try{
        $query="INSERT INTO commande_admin(id_admin,id_produit,date,recu,qte) VALUES(:id_admin,:id_prod,:date,:recu,:qte)";
        $resultset= $this->_db->prepare($query);
        $resultset->bindParam(':id_admin',$idadmin,PDO::PARAM_INT);
        $resultset->bindParam(':id_prod',$idprod,PDO::PARAM_INT);
        $resultset->bindParam(':date',$date,PDO::PARAM_STR);
        $resultset->bindParam(':recu',$reçu,PDO::PARAM_INT);
        $resultset->bindParam(':qte',$qte,PDO::PARAM_INT);
        $resultset->execute();
        $data=$resultset->fetchAll();
        }catch(PDOException $e){
            print $e->getMessage();
        }
        return $data;
    }
}

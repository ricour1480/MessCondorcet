<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitsBD
 *
 * @author ricou
 */
class ProduitsBD extends Produits{
    private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getAllProduits() {
        try {
            $query="SELECT * FROM produits";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){            
            try {
                $_produitArray[] = new Produits($data);

            } catch(PDOException $e) {
                
                print $e->getMessage();
            }            
        }
        return $_produitArray;        
    }
    public function AddProduits(int $id_cat,string $nom, float $prix,int $stock_min){
        try{
            $insert="INSERT INTO produits(id_categorie,nom_produit,prix_produit,stock_min) VALUES(:id_cat,:nom_prod,:prix,:stock)";
            $resultset=$this->_db->prepare($insert);
            $resultset->bindParam(':id_cat',$id_cat,PDO::PARAM_INT);
            $resultset->bindParam(':nom_prod',$nom,PDO::PARAM_STR);
            $resultset->bindParam(':prix',$prix,PDO::PARAM_STR);
            $resultset->bindParam(':stock',$stock_min,PDO::PARAM_INT);
            $resultset->execute();   
            if($resultset->rowCount()>0){
                print "Insertion éffectué";
            }
        } catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public function getProduit(int $id_prod){
        try {
            $query="SELECT * FROM produits WHERE id_produit=:id_prod";
            $resultset = $this->_db->prepare($query);
           $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
            $resultset->execute();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        
        while($data = $resultset->fetch()){            
            try {
                $_pArray[] = new Produits($data);

            } catch(PDOException $e) {
                
                print $e->getMessage();
            }            
        }
        return $_pArray;   
    }
}

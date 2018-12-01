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
            $query="SELECT * FROM produit";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $_produitArray=$resultset->fetchAll();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return $_produitArray;        
    }
    public function AddProduits($id_cat,$nom,$prix,$stock_min){
        try{
            $insert="INSERT INTO produit(id_categorie,nom_produit,prix_produit,stock_min) VALUES(:id_cat,:nom_prod,:prix,:stock)";
            $resultset=$this->_db->prepare($insert);
            $resultset->bindParam(':id_cat',$id_cat,PDO::PARAM_INT);
            $resultset->bindParam(':nom_prod',$nom,PDO::PARAM_STR);
            $resultset->bindParam(':prix',$prix,PDO::PARAM_STR);
            $resultset->bindParam(':stock',$stock_min,PDO::PARAM_INT);
            $resultset->execute();
            $data=$resultset->fetchAll();
        } catch(PDOException $e){
            print $e->getMessage();
        }
        return $data;
    }
    public function getProduit($id_prod){
        try {
            $query="SELECT * FROM produit WHERE id_produit=:id_prod";
            $resultset = $this->_db->prepare($query);
           $resultset->bindParam(':id_prod',$id_prod,PDO::PARAM_INT);
            $resultset->execute();
            $_pArray=$resultset->fetchAll();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
        return $_pArray;   
    }
    public function getProduitByCat($id_cat){
         try {
            $query="SELECT * FROM produit WHERE id_categorie=:id_cat";
            $resultset = $this->_db->prepare($query);
           $resultset->bindParam(':id_cat',$id_cat,PDO::PARAM_INT);
            $resultset->execute();
        } catch(PDOException $e) {
            print $e->getMessage();
        }
       $_pArray=$resultset->fetchAll();
        return $_pArray;  
    }
}

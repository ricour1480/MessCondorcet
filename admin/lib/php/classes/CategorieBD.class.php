<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategorieBD
 *
 * @author ricou
 */
class CategorieBD extends Categorie {
    private $_db;
    private $_Array=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }   
    public function getCategorie($id_cat) {
        try{
        $query="SELECT libelle_categorie FROM categorie WHERE id_categorie=:id_cat";
        $resultset=$this->_db->prepare($query);
        $resultset->bindParam(':id_cat',$id_cat,PDO::PARAM_INT);
        $resultset->execute();
        $_CatArray=$resultset->fetchAll();
        }catch(PDOException $e){
            print $e->getMessage();
        } 
        return $_CatArray;   
    }
    public function getAllCategorie() {
         try{
        $query="SELECT * FROM categorie";
        $resultset=$this->_db->prepare($query);
        $resultset->execute();
        $data=$resultset->fetchAll();
        }catch(PDOException $e){
            print $e->getMessage();
        } 

        return $data;
    }
}

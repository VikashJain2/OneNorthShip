<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class ProductModel extends CI_Model{
   public function insert_products($product){
    if (!empty($product)) {
                $this->db->insert('products', $product);
        }
   }
}
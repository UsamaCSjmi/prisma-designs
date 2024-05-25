<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once('Customer.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 

class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

   
    public function getAllProduct()
    {
        if(Customer::checkLogin()){
            $query = "select * from product order by id desc";
        }
        else{
            $query = "select * from product where is_protected = 0 order by id desc";
        }
        $result = $this->db->select($query);
        return $result;
    }

    public function getProByCatId($catid)
    {
        if(Customer::checkLogin()){
            $query = "select * from product where categories_id=$catid";
        }
        else{
            $query = "select * from product where categories_id=$catid and is_protected=0;";
        }
        $result = $this->db->select($query);
        return $result;
    }

    public function getProBySubCatId($subcatid)
    {
        if(Customer::checkLogin()){
            $query = "select * from product where sub_categories_id=$subcatid";
        }
        else{
            $query = "select * from product where sub_categories_id=$subcatid and is_protected = 0";
        }
        $result = $this->db->select($query);
        return $result;
    }

    public function getProImgByCatId($cat)
    {
        $query = "SELECT image FROM product WHERE categories_id = '$cat' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProImgBySubCatId($subcat)
    {
        $query = "SELECT image FROM product WHERE sub_categories_id = '$subcat' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function getNewProducts($x)
    {
        if(Customer::checkLogin()){
            $query = "SELECT * FROM product ORDER BY Id ASC LIMIT $x";
        }
        else{
            $query = "SELECT * FROM product where is_protected = 0 ORDER BY Id ASC LIMIT $x";
        }
        $result = $this->db->select($query);
        return $result;
    }

}

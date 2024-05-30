<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
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
        $query = "select * from product order by id desc";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getProByCatId($catid)
    {
        $query = "select * from product where categories_id=$catid AND status=1 ";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getProBySubCatId($subcatid)
    {
        $query = "select * from product where sub_categories_id=$subcatid AND status=1";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getNewProducts($x)
    {
        $query = "SELECT * FROM product WHERE status=1 ORDER BY Id ASC LIMIT $x";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

}

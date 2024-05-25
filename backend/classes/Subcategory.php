<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Subcategory
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getSubcatByCatId($catid)
    {
        $query = "SELECT * FROM sub_categories WHERE categories_id = '$catid' AND status=1";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getCatName($id)
    {
        $query = "SELECT sub_categories FROM sub_categories WHERE id=$id";
        $result = $this->db->select($query);
        $result = mysqli_fetch_array($result);
        return $result['sub_categories'];
    }
}
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllCat()
    {
        $query = "SELECT * FROM categories WHERE status=1 ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCatName($id)
    {
        $query = "SELECT categories FROM categories WHERE id=$id";
        $result = $this->db->select($query);
        $result = mysqli_fetch_array($result);
        return $result['categories'];
    }

    public function getCategoryBySlug($slug)
    {
        $query = "SELECT * FROM categories WHERE slug='$slug'";
        $result = $this->db->select($query);
        if($result){
            return mysqli_fetch_array($result);
        }
        else{
            return false;
        }
    }

    public function getCatWithImage()
    {
        $query = "SELECT categories.categories,product.image FROM categories,product WHERE categories.id = product.categories_id GROUP BY categories.id";
        $result = $this->db->select($query);
        // $result = mysqli_fetch_array($result);
        return $result;
    }
}

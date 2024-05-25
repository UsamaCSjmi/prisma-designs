<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Images
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getImage($type)
    {
        $query = "SELECT * FROM images WHERE image_type = '$type'";
        $result = $this->db->select($query);
        $result = mysqli_fetch_array($result);
        return $result;
    }
}

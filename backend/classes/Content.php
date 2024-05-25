<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Content
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getContent($content)
    {
        $query = "SELECT * FROM store_details WHERE type = '$content'";
        $result = $this->db->select($query);
        $result = mysqli_fetch_array($result);
        return $result;
    }
}

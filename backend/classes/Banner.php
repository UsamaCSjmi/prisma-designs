<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 
class Banner
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllBannerByPageName($pageName)
    {
        $query = "SELECT banners.* FROM banners JOIN pages ON banners.page_id = pages.page_id WHERE pages.page = '$pageName'";
        $result = $this->db->select($query);
        $result = mysqli_fetch_array($result);
        return $result;
    }
}

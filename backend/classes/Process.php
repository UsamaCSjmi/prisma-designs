<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 

class Process
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

   
    public function getAllprocess()
    {
        $query = "select * from process order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLimitedprocess($x)
    {
        $query = "select * from process order by id desc LIMIT $x";
        $result = $this->db->select($query);
        return $result;
    }

}

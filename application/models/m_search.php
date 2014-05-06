<?php
class M_search extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }
    public function get_search($keywords) 
    {
        $sql = "SELECT * FROM sh_posts WHERE pt_content LIKE '%$keywords%'";
        $query = $this -> db ->query($sql);
        $res = $query ->result();
        return $res;
    }
};
?>

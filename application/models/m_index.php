<?php
class M_index extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_content_title() {
        $query = $this ->db ->query('SELECT *  FROM sh_content');
        return $query ->result();
    }
}
?>

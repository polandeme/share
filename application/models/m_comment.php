<?php 
class M_comment extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_comment($data)
    {
        $this ->db ->insert('sh_comment', $data);
    }
    public function get_comment($postId)
    {
        $query = $this ->db ->get_where('sh_comment', array('ct_pt_id' => $postId));
        $res = $query ->result();
        return $res;
    }
};

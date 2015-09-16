<?php 
class M_comment extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_comment($data)
    {
        // var_dump($data);
        $this ->db ->insert('sh_comment', $data);
        var_dump($data);
        $ptId = $data['ct_pt_id'];
        echo $ptId;
        $sql = "UPDATE sh_posts SET pt_com_num=pt_com_num + 1 WHERE pt_id = $ptId ";
        echo $sql;
        $query = $this ->db ->query($sql);
    }
    public function get_comment($postId)
    {
        $query = $this ->db ->get_where('sh_comment', array('ct_pt_id' => $postId));
        $res = $query ->result();
        return $res;
    }
};

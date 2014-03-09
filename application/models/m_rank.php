<?php
class M_rank extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function add_vote($pid)
    {
        $sql = "update sh_posts set pt_up = pt_up + 1 where pt_id = '$pid' ";
        $query = $this ->db ->query($sql);
        $data = $this ->db ->query("SELECT pt_up , pt_uid from sh_posts where pt_id = '$pid' Limit 1");
        $row = $data ->row();

        $uid = $row ->pt_uid ;
        $sql = "update sh_user set u_up = u_up + 1 where u_id = '$uid' ";
        $query = $this ->db ->query($sql);

        return $row ->pt_up; 
    }
};
?>

<?php
class M_rank extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function add_vote($pid,$uid)
    {
        $this ->insert_rela($pid,$uid);
        $sql = "update sh_posts set pt_up = pt_up + 1 where pt_id = '$pid' ";
        $query = $this ->db ->query($sql);
        $data = $this ->db ->query("SELECT pt_up , pt_uid from sh_posts where pt_id = '$pid' Limit 1");
        $row = $data ->row();

        $uid = $row ->pt_uid ;
        $sql = "update sh_user set u_up = u_up + 1 where u_id = '$uid' ";
        $query = $this ->db ->query($sql);
        return $row ->pt_up; 
    }

    public function insert_rela($pid,$uid)
    {
        $sql = "INSERT INTO sh_uprela (u_id,p_id,up_rela) VALUES ('$uid','$pid','1')";
        $this ->db ->query($sql);
    }

    /**
     * 检测用户是否赞过该文章
     *
     * @param   $uid,$pid 用户id 文章id
     * @return  bollean 赞过返回TRUE
     * @author  Polande
     * @date    Apr 16 2014
     */  
    public function check_up($uid,$pid)
    {
        $sql = "SELECT up_rela FROM sh_uprela WHERE u_id = '$uid' AND p_id = '$pid' LIMIT 1";
        $query = $this ->db ->query($sql);
        $res = $query ->row_array();
        if($res) {
            return true;
        } else {
            return false;
        }
    }

    public function get_up($uid)
    {
        $sql = "SELECT p_id FROM sh_uprela WHERE u_id = '$uid'";
        $query = $this ->db ->query($sql);
        $res = $this ->result_array();
        return $res;
    }
};
?>

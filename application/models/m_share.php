<?php
class M_share extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function get_post_msg($postId)
    {
        $query = $this ->db ->query("SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user 
                    WHERE sh_user.u_id = sh_posts.pt_uid AND pt_id = '$postId' LIMIT 1");
        $res = $query ->row_array();
        return $res;
    }
};

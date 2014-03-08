<?php
class M_index extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_content_title($num , $offset ) 
    {

        $query = $this ->db ->query("SELECT sh_posts.* , sh_user.u_name FROM sh_posts, sh_user WHERE sh_user.u_id = sh_posts.pt_uid LIMIT $offset, $num ");
        return $query ->result();
    }

    public function get_posts_all()
    {
        return $this ->db ->count_all_results();
    }
};
?>

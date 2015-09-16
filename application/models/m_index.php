<?php
class M_index extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }

    public function get_content_title($num , $offset ) 
    {   
        $offset = ($num ) * ($offset ? $offset -1 : 0);
        $sql = "SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user WHERE sh_user.u_id = sh_posts.pt_uid  ORDER BY sh_posts.pt_id DESC LIMIT $offset , $num";
        $query = $this ->db ->query($sql);
        return $query ->result();
    }

    public function get_posts_all()
    {
        return $this ->db ->count_all_results();
    }

    public function get_hot_cate()
    {
        $sql = "SELECT pt_cate, count(*) AS count 
                FROM sh_posts 
                GROUP BY pt_cate
                ORDER BY count DESC
                LIMIT 7";
        $query = $this ->db ->query($sql);
        $res = $query ->result();
        return $res;
    }
    public function get_hot_user()
    {
        $hotUser = array(); 
        $sql = "SELECT pt_uid, count(*) AS count 
                FROM sh_posts 
                GROUP BY pt_uid
                ORDER BY count DESC
                LIMIT 10";
        $query = $this ->db ->query($sql);
        $res = $query ->result();
        foreach ($res as $row)
        { 
            $userow = $row ->pt_uid;
            $sql = "SELECT u_name, u_motto, u_role1 FROM sh_user where u_id = '$userow' LIMIT 1";
            $query = $this ->db ->query($sql);
            $res = $query ->row_array();

            array_push($hotUser, $res); 
        }
        return $hotUser;
    }

    public function get_hot_role()
    {
        $sql = "SELECT pt_role, count(*) AS count 
                FROM sh_posts 
                WHERE sh_posts.pt_role != '' 
                GROUP BY pt_role
                ORDER BY count DESC
                LIMIT 10";
        $query = $this ->db ->query($sql);
        $res = $query ->result();
        return $res;
    }

    public function is_uped($pt_id, $u_id) {  
        $u_id_r = ',' . $u_id . ',';
        $sql = "select * from sh_posts where locate('$u_id_r', pt_up_uid) AND pt_id = '$pt_id' ";
        $query = $this ->db -> query($sql);
        $res = $query ->row_array();
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
};

?>

<?php
class M_search extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }

    /**
     *   得到搜索结果
     *   @TODO   搜索结果分页
     */

    public function get_search($keywords) 
    {
        $sql = "SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user WHERE sh_user.u_id = sh_posts.pt_uid AND (pt_content LIKE '%$keywords%' OR pt_cate LIKE '%$keywords%' OR pt_role LIKE '%$keywords%')";
        $query = $this -> db ->query($sql);
        $res = $query ->result();
        return $res;
    }

    /**
     *  搜索特定的分类词条，每次显示10条
     *  @TODO   搜索结果分页
     */
    public function search_cate($keywords) 
    {
        $sql = "SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user WHERE sh_user.u_id = sh_posts.pt_uid AND pt_cate LIKE '%$keywords%' LIMIT 10";
        $query = $this -> db ->query($sql);
        $res = $query ->result();
        return $res;
    }
};
?>

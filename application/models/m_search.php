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
     *  模糊匹配
     *  搜索特定的分类词条，每次显示10条
     *  @TODO   搜索结果分页
     */
    public function search_cate($keywords) 
    {
         // $sql = "SELECT sh_posts.* FROM sh_posts WHERE pt_cate LIKE '%$keywords%' LIMIT 10";
        // 自己都忘记当时为什么写成下面这样了，但是上面也是对的，先用上面的跑着@BUG
        $sql = "SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user WHERE sh_user.u_id = sh_posts.pt_uid AND pt_cate LIKE '%$keywords%' LIMIT 10";
        $query = $this -> db ->query($sql);
        $res = $query ->result();
        return $res;
    }

    /**
     * 精确(explicit)匹配
     * 搜索特定的分类词条
     * return n条信息
     * @TODO    对搜索出来的做排序: 根据浏览量、发布时间等
    */
    public function exp_search_cate($keywords, $postId)
    {
        // $postId = 0; //  如果postId为0 则表示不限制id, 在他api可能会用到
        $sql = "SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user WHERE pt_cate = '$keywords' AND pt_id != '$postId' AND sh_user.u_id = sh_posts.pt_uid LIMIT 10 ";
        $query = $this ->db ->query($sql);
        $res = $query ->result();
        return $res;
    }
};
?>

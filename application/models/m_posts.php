<?php
class M_posts extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function submit_posts($data)
    {
        $this ->db ->insert('sh_posts', $data);
    }

    /**
     * 怎加详细内容更新到数据库
     *
     * @param   $postDetail 提交的详细信息 $postId 文章id
     * @date    Mar 15 2014
     */
    public function add_post_detail($postDetail, $postId)
    {
        $sql = "UPDATE sh_posts SET pt_detail = '$postDetail' WHERE pt_id = '$postId'";
        $this ->db ->query($sql);
    }

    /**
     * ajax 得到文章作者信息
     *
     * @param   作者id
     * @return  文章id 数组
     * @author  Polande
     * @date    Mar 11 2014
     */
    public function ajax_get_post_author($id)
    {
        $sql = "SELECT * FROM sh_user WHERE u_sec_id = '$id' LIMIT 1";
        $query = $this ->db ->query($sql);
        $res = $query ->result_array();
        return $res;
    }
};
?>

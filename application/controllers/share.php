<?php
class Share extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
        $this ->load ->helper('url');
        $this ->load ->model('m_share');
        $this ->load ->model('m_search');
        $this ->load ->library('session');
        $this ->load ->model('m_comment');
    }

    public function index($postId)
    {
        $postId = ($postId / 10 -19940309) /1024;
        $data['post'] = $this ->m_share ->get_post_msg($postId);
        $data['comment'] = $this ->m_comment ->get_comment($postId);
        $curCate = $data['post']['pt_cate'];
        $data['sameCate'] = $this ->get_same_cate($curCate, $postId);
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('share', $data);
    }

    /**
     * 得到和当前页相同的N条分类, 且不包含这个分类
     * @条数可以配置，只要小于10条
     * $postId 为0，表示不限制id,其他api可能会用到
    */

    public function get_same_cate($cate, $postId) {
        return $this ->m_search ->exp_search_cate($cate, $postId);
    }
};

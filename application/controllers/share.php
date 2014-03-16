<?php
class Share extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
        $this ->load ->helper('url');
        $this ->load ->model('m_share');
        $this ->load ->library('session');
        $this ->load ->model('m_comment');
    }

    public function index($postId)
    {
        $postId = ($postId / 10 -19940309) /1024;
        $data['post'] = $this ->m_share ->get_post_msg($postId);
        $data['comment'] = $this ->m_comment ->get_comment($postId);
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('share', $data);
    }
};

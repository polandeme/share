<?php
class Share extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_share');
        // $this ->load ->model('m_index');
    }

    public function index($postId)
    {
        $data['post'] = $this ->m_share ->get_post_msg($postId);
        $this ->load ->view('template/header');
        $this ->load ->view('share', $data);
    }
};

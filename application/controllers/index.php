<?php
class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_index');
        $this ->load ->library('session');
    }
    public function index() {
        $data['title'] = $this ->m_index ->get_content_title();
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('index', $data);
    }
};
?>

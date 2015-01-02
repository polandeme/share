<?php
class Brower extends CI_Controller {
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->model('m_comment');
        $this ->load ->helper('url');
        $this ->load ->library('session');
    }
    
    public function index() 
    {
        $this ->load ->view('sorry');
    }
};

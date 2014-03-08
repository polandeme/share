<?php
class Index extends CI_Controller {
    public function __construct() {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_index');
        $this ->load ->library('session');
    }

    public function index($offset) {
        //TO Do 分页操作 

        
        // $this ->load ->library('pagination');
        // $config['base_url'] = base_url().'index.php/index';
        // $config['total_rows'] = $this ->m_index ->get_posts_all();
        // $num = $config['per_page'] = 2;
        // $config['uri_segment'] = 3;
        // $config['full_tag_open'] = '<p>';
        // $config['full_tag_close'] = '</p>';
        // $config['use_page_numbers'] = true;
        // $this ->pagination ->initialize($config);
        // $data['links'] = $this ->pagination ->create_links();

        $num = 1;
        $data['title'] = $this ->m_index ->get_content_title((($this ->uri ->segment(3)) > 0 ? $this ->uri ->segment(3) : 0), $num);
        $sessionData = $this ->session ->all_userdata();
        
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('index', $data);
    }
    public function test()
    {
        echo "test";
    }
};
?>

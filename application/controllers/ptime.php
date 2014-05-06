<?php
class Ptime extends CI_Controller {
    public function __construct() {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_ptime');
        $this ->load ->library('session');
    }

    public function index() {
        //TO Do 分页操作 

        $this ->load ->library('pagination');
        $config['base_url'] = base_url().'index.php/ptime/index';
        $config['total_rows'] = $this ->db ->count_all('sh_posts');
        $config['per_page'] = 10;
        $num = $config['per_page'];
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['use_page_numbers'] = TRUE;
        $this ->pagination ->initialize($config);
        $data['links'] = $this ->pagination ->create_links();
        $offset = $this ->uri ->segment(3);

        $data['title'] = $this ->m_ptime->get_content_title($num , ($offset && $offset >= 0 ? $offset : 0));
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('ptime', $data);
    }
};
?>

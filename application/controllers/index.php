<?php
class Index extends CI_Controller {
    public function __construct() {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_index');
        $this ->load ->model('m_rank');
        $this ->load ->library('session');
    }

    public function index() 
    {
        //TO Do 分页操作 

        $this ->load ->library('pagination');
        $config['base_url'] = base_url().'index.php/index/index';
        $config['total_rows'] = $this ->db ->count_all('sh_posts');
        $config['per_page'] = 10;
        $num = $config['per_page'];
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['use_page_numbers'] = TRUE;
        $this ->pagination ->initialize($config);
        $data['links'] = $this ->pagination ->create_links();
        $offset = $this ->uri ->segment(3);

        $data['title'] = $this ->m_index ->get_content_title($num , ($offset && $offset >= 0 ? $offset : 0));
        $this ->is_uped($data['title']);
        $data['cate'] = $this ->m_index ->get_hot_cate();     
        $data['user'] = $this ->m_index ->get_hot_user();     
        // $data['role'] = $this ->m_index ->get_hot_role();     
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('index', $data);
    }

    public function is_uped($pt_set) 
    {
        $u_id = $this ->session ->userdata('userId');
        for($i = 0; $i < count($pt_set); $i++) {
            $pt_set[$i] ->is_up = $this ->m_index ->is_uped($pt_set[$i]->pt_id, $u_id) ? 'voted' : '';
        }
    }
};
?>

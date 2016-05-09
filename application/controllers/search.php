<?php 
class Search extends CI_Controller {
    public function __construct() {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_search');
        $this ->load ->model('m_index');
        $this ->load ->model('m_rank');
        $this ->load ->library('session');
    }
    function index() {

        $keywords = $this ->input ->get('search',TRUE);
        $search_res = $this ->m_search ->get_search($keywords);
        $data['search_res'] = $search_res;
        $this ->load ->library('pagination');
        $config['base_url'] = base_url().'index.php/index/index';
        $config['total_rows'] = count($search_res);
        $config['per_page'] = 10;
        $num = $config['per_page'];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li><a href="#" class="active">';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_tag_open'] ="<li>";
        $config['next_tag_close'] ="</li>";
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['anchor_class'] = "class='pagination-item'";

        $config['use_page_numbers'] = TRUE;
        $this ->pagination ->initialize($config);
        $data['links'] = $this ->pagination ->create_links();
        $offset = $this ->uri ->segment(3);


        $this ->is_uped($data['search_res']);
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('search', $data);

    }

    /**
     *  搜索特定分类
     *
    */

    public function search_cate()
    {
        $keywords = $this ->input ->get('search',TRUE);
        $search_res = $this ->m_search ->search_cate($keywords);
        $data['search_res'] = $search_res;

        $this ->load ->library('pagination');
        $config['base_url'] = base_url().'index.php/index/index';
        $config['total_rows'] = count($search_res);
        $config['per_page'] = 10;
        $num = $config['per_page'];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li><a href="#" class="active">';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_tag_open'] ="<li>";
        $config['next_tag_close'] ="</li>";
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['anchor_class'] = "class='pagination-item'";

        $config['use_page_numbers'] = TRUE;
        $this ->pagination ->initialize($config);
        $data['links'] = $this ->pagination ->create_links();
        $offset = $this ->uri ->segment(3);

        $this ->is_uped($data['search_res']);
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('search', $data);
    }
    /**
     * 判断当前用户是否赞过文章
    */
    public function is_uped($pt_set) 
    {
        $u_id = $this ->session ->userdata('userId');
        for($i = 0; $i < count($pt_set); $i++) {
            $pt_set[$i] ->is_up = $this ->m_index ->is_uped($pt_set[$i]->pt_id, $u_id) ? 'voted' : '';
        }
    }
    /**
     *  搜索页面所用的基本功能，--分页
     *   @TODO  写到comment.php
    */
    public function search_conn()
    {


    }
};
?>

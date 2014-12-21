<?php 
class Search extends CI_Controller {
    public function __construct() {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_search');
        $this ->load ->library('session');
    }
    function index() {
        $keywords = $this ->input ->get('search',TRUE);
        $search_res = $this ->m_search ->get_search($keywords);
        $data['search_res'] = $search_res;
        $this ->load ->view('search', $data);
    }
};
?>

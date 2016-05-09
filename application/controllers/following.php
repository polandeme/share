<?php
class Following extends CI_Controller {
	public function __construct(){
		// data_default_timezone_set('Asia/Shanghia');
		parent::__construct();
		$this ->load ->helper('url');
		$this ->load ->library('session');
		$this ->load ->model('m_log');
		$this ->load ->model('m_index');
	}

	/**
	 *		对用户的操作插入一条记录到log表
	 *		得到当前用户的id:$uid，被操作文章$pid
	 */

	public function index() {
       
		if(!$this ->is_login()) {
			$data['tip'] = '请先登录';
	        $this ->load ->view('template/header');
			$this ->load -> view('login', $data);
		} else {

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

	        $userId = $this ->session ->userdata('id');
	        $data['log'] = $this ->m_log ->get_user_friend($userId);
	        $this ->is_uped($data['log']);
	        $data['cate'] = $this ->m_index ->get_hot_cate();     
	        $data['user'] = $this ->m_index ->get_hot_user();     
	        // $data['role'] = $this ->m_index ->get_hot_role();     
	        $sessionData = $this ->session ->all_userdata();
	        $this ->load ->view('template/header', $sessionData);

	        if(count($data['log']) <1) {
				echo "你还没有关注其他人，请先关注你可能喜欢的用户";
	        	$this ->load ->view('follow', $data);
	        } else {
	        	$this ->load ->view('following', $data);
	        }
		}
	}

	public function is_uped($pt_set) 
    {
        $u_id = $this ->session ->userdata('userId');
        for($i = 0; $i < count($pt_set); $i++) {
            $pt_set[$i] ->is_up = $this ->m_index ->is_uped($pt_set[$i]->pt_id, $u_id) ? 'voted' : '';
        }
    }

    public function is_login()
    {
        $userId = $this ->session ->userdata('userId');
        if(empty($userId)) 
        {
        	return false;
        } else {
        	return true;
        }
    }
}
?>
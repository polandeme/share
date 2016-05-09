<?php
class Comment extends CI_Controller {
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->model('m_comment');
        $this ->load ->helper('url');
        $this ->load ->library('session');
    }

    /**
     * 判断用户是否登录
     * 利用session
     */
    public function check_login()
    {
        $userId = $this ->session ->userdata('userId');
        if(empty($userId)) 
        {
            redirect('/user/login');
        }
    }

    public function insert_comment()
    {
        $this ->check_login(); 
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('postId','detail','required');
        $this ->form_validation ->set_rules('userId','postId','required|trim');
        $this ->form_validation ->set_rules('comment','postId','required|trim');
        $postId = $this ->input ->post('postId');
        $userId = $this ->input ->post('userId');  //前端显示 id 未加密
        $commentDetail = $this ->input ->post('comment');
        $postId = ($postId /10 -19940309) /1024;
        $data = array(
            'ct_sec_id' => sha1(time() . $postId) ,
            'ct_pt_id'  => $postId,
            'ct_uid'    => $userId,
            'ct_date'   => date('Y-m-d H:i:s'),
            'ct_detail' => $commentDetail,
            'ct_up'     => '0'
        );

        if($this ->form_validation ->run() == false) 
        {
            redirect('/');
        } else {
            $postId = $this ->input ->post('postId');
            $this ->m_comment ->insert_comment($data);
            redirect("/share/index/$postId");
        }
    }

};

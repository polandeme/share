<?php
class Posts extends CI_Controller {
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_posts');
        $this ->load ->model('m_user');
        $this ->load ->library('session');
    } 
    
    /**
     * 判断用户是否登录
     * 利用session
     */
    public function check_login()
    {
        $userId = $this ->session ->userdata('userId');
        // echo $userId;
        if(empty($userId)) 
        {
            redirect('/user/login');
        }
    }

    public function submit_posts()
    {
        $this ->check_login();
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('inputContent','UserName','');
        $this ->form_validation ->set_rules('inputCate','UserEmail','required|trim');
        $this ->form_validation ->set_rules('inputRole','UserPassward','');

        $data = array(
            'pt_date'   => date('Y-m-d H:i:s'), 
            'pt_cate'   => $this ->input ->post('inputCate'),
            'pt_role'   => $this ->input ->post('inputRole'),
            'pt_content'=> $this ->input ->post('inputContent'),
            'pt_uid'    => $this ->session ->userdata('userId') 
        );

        if($this ->form_validation ->run() == False ) 
        {
            redirect('/');
        }
        else 
        {
            $this ->m_posts ->submit_posts($data);
            $userId = $this ->session ->userdata('userId');
            $postId = $this ->m_posts ->get_lastest_id($userId);
            $postId = ($postId*1024+19940309) *10 ;
            redirect("/share/index/$postId");
        }
    }

    /**
     *  添加文章详细
     */
    public function add_post_detail()
    {
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('postDetail','detail','required');
        $this ->form_validation ->set_rules('postId','postId','required|trim');
        $postDetail = $this ->input ->post('postDetail'); 
        $postId = $this ->input ->post('postId');
        $postId = (($postId)/10 - 19940309) /1024; 

        if($this ->form_validation ->run() == false ) 
        {
            redirect('/');
        } else {
            $this ->m_posts ->add_post_detail($postDetail, $postId);
            $postId = $this ->input ->post('postId');
            redirect("/share/index/$postId");
        }
    }
    /**
     * ajax得到用户信息
     * 
     * 
     */
    public function ajax_get_post_author()
    {
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $id = $_GET['id'];  //friend ID
        $userId = $_GET['userId'];
        $realtion = $this ->m_user ->get_user_relation($userId, $id );
        $data = $this ->m_posts ->ajax_get_post_author($id);
        $data[0]['relation'] = $realtion;
        echo json_encode($data);
    }
};    
?>

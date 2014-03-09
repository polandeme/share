<?php
class Posts extends CI_Controller{
    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_posts');
        $this ->load ->library('session');
    } 

    public function submit_posts()
    {
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('inputContent','UserName','required');
        $this ->form_validation ->set_rules('inputCate','UserEmail','required|trim');
        $this ->form_validation ->set_rules('inputRole','UserPassward','');

        $data = array(
            'pt_date' =>date('Y-m-d H:i:s'), 
            'pt_cate'  => $this ->input ->post('inputCate'),
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
            redirect('/user/login');
        }
    }
};    
?>

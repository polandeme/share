<?php
class Settings extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
        $this ->load ->helper('url');
        $this ->load ->model('m_settings');
        $this ->load ->library('session');
    }

    public function index()
    {   
        echo "hello settings";
        // return false;

        // $this -> check_if_login();
        // $postId = 2;
        // $postId = ($postId / 10 -19940309) /1024;
        // $sessionData = $this ->session ->all_userdata();
        // $this ->load ->view('template/header', $sessionData);
        // $this ->load ->view('settings');

    }
    function profile() {

        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('userName','UserName','is_unique[sh_user.u_name]');
        $this ->form_validation ->set_rules('motto','motto','trim|xss_clean');
        $this ->form_validation ->set_rules('role1','role1','trim|xss_clean');
        $this ->form_validation ->set_rules('role2','role2','trim|xss_clean');

        if(empty($this ->input ->post('userName'))) {
           $userName = $this ->session ->userdata('userName');

        } else {
            $userName = $this ->input ->post('userName');
        }

        if(empty($this ->input ->post('motto')) ) {
            $motto = $this ->session ->userdata('userMotto');
        } else {
            $motto = $this ->input ->post('motto');
        }

        $data = array(
            'role1'  => $this ->input ->post('role1'),
            'role2'  => $this ->input ->post('role2'),
            'userName' => $userName,
            'motto' => $motto
        );

        if ($this ->form_validation ->run() == False ) {

            redirect('/user/register');
        } else {
            $userId = $this ->session ->userdata('userId');
            
            $this ->m_settings ->add_user($data, $userId);

            $userSession = $this ->session ->set_userdata("userName", $data['userName']);
            $userSession = $this ->session ->set_userdata("userMotto", $data['motto']);
            
            // var_dump($userSession);
            redirect('/user/login');
        }
    }
    /**
     * 判断用户是否登录
     * 利用session
     */
    public function check_if_login()
    {
        $userId = $this ->session ->userdata('userId');
        if(empty($userId)) 
        {
            redirect('/user/login');
        }
    }

};

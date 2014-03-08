<?php 
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_user');
        $this ->load ->library('session');
    }
    public function index() {
        // to do 
        // 判断是否登录
        // if 登录 进入个人中心
        // else 进入登录页面
    }

    /**
     * load register page
     * @author  Polande
     * @date    Mar 03 2014
     */
    public function register() 
    {
        $sessionData = $this -> session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('register');
    }

    /**
     * 验证用户提交的数据
     *  得到用户提交的数据，当作参数传递到 m_user ->add_user()处理
     *
     * @To Do   验证规则优化
     * @author  Polande
     * @date    Mar 03 2014
     */
    public function add_user() {
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('userName','UserName','required|min_length[3]|max_length[12]|is_unique[sh_user.u_name]');
        $this ->form_validation ->set_rules('userEmail','UserEmail','required|trim|valid_email');
        $this ->form_validation ->set_rules('userPwd','UserPassward','required|trim|min_length[6]|max_lenth[32]');
        $this ->form_validation ->set_rules('userPwdConfirm', 'confirm passward', 'trim|matches[userPwd]');

        $data = array(
            'userName'  => $this ->input ->post('userName'),
            'userEmail' => $this ->input ->post('userEmail'),
            'userPwd'   => $this ->input ->post('userPwd'), 
            'userIp'    => $this ->input ->ip_address(),
            'userMott'  => "Hi 空着不好，赶快写上一句话吧,(>_<)",
            'userAva'   => "default.jpg",
            'regTime'   => time()
        );
        //将用户密码加密
        $userPwd = SHA1($data['userPwd'] . $data['regTime']. "ShArE");
        if($this ->form_validation ->run() == False ) {
            redirect('/user/register');
        } else {
            $this ->m_user ->add_user($data, $userPwd);
            redirect('/user/login');
        }
    }

        /**
         * To DO 如果已经登录，提示并跳转到上一页面
         * @date    Mar 04 2014
         * @author  Polande
         */
    public function login() 
    {
        $sessionData = $this ->session ->all_userdata();
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('login');
 
    }

    /**
     * 保存用户信息到session
     *
     * @param   $userdata 从数据库读取的用户信息 
     * @return  Array 保存用户数据的session 数组
     * @author  Polande
     * @date    Mar 04 2014 
     */
    public function save_user_info($userdata)
    {
        $data = array(
                'userName'  =>$userdata['u_name'],
                'userEmail' =>$userdata['u_email'],
                'regTime'   => $userdata['u_reg_time'],
                'userMotto' => $userdata['u_motto'],
                'userSex'   => $userdata['u_sex'],
                'userAvat'  => $userdata['u_avatar'],
                'userId'    => $userdata['u_id']
            );
        $userSession = $this ->session ->set_userdata($data);
        return  $this ->session ->all_userdata('$suerSession');
    }

    /**
     * 将用户输入数据传递到m_user
     *   登录成功后将返回的用户数据存到session中 
     *
     * @author  Polande
     * @date    Mar 03 2014
     */
    public function check_login(){
        $name       = $this ->input ->post('userName');
        $password   = $this ->input ->post('userPwd');
        $userdata = $this ->m_user ->login($name, $password);
        if($userdata) {
           $this ->save_user_info($userdata);
           redirect('/');
        } else {
            echo "失败"; 
        }
    }
};
?>

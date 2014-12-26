<?php 
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this ->load ->helper('url');
        $this ->load ->model('m_user');
        $this ->load ->library('session');
        $this->load->library('image_lib');
    }


    /**
     * 判断是否登录进入个人中心
     *
     * @param   用户id(缩写/name)
     * @Date    Mar 13 2014
     */
    public function index($uid) 
    {
        // to do 
        // 判断是否登录
        // if 登录 进入个人中心
        // else 进入登录页面
        $uid = ($uid/10 -19940309) / 1024;
        $sessionData = $this -> session ->all_userdata();
        $data['posts'] = $this ->get_user_posts($uid);
        $data['user'] = $this ->m_user ->index($uid);
        $this ->load ->view('template/header', $sessionData);
        $this ->load ->view('user',$data);
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
            'regTime'   => time()
        );
        //将用户密码加密
        $userPwd = SHA1($data['userPwd'] . $data['regTime']. "ShArE");
        if ($this ->form_validation ->run() == False ) {
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
        // var_dump($this ->session ->userdata);
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
                'userId'    => $userdata['u_id'],
                'id'        => $userdata['u_sec_id']
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
        $userdata   = $this ->m_user ->login($name, $password);
        if ($userdata) {
           $this ->save_user_info($userdata);
           redirect('/');
        } else {
            echo  $name . $password . $userdata;
            echo "失败"; 
        }
    }

    /**
     * ajax 注册时检测用户是否存在
     * @return  FALSE  不存在用户
     */
    public function check_register()
    {
        $name = $_GET['name']; 
        $flag = $this ->m_user ->check_register($name);
        if($flag)
        {
           echo TRUE; 
        }
        else {
            echo FALSE ;
        }
    }

    // 退出登录跳转到首页
    public function logout()
    {
        $data = array(
                'userName'  => '',
                'userEmail' => '', 
                'regTime'   => '',
                'userMotto' => '',
                'userSex'   => '',
                'userAvat'  => '',
                'userId'    => ''
            );
        $this ->session ->unset_userdata($data);
        redirect('/');
    }
    
    /**
     * 用户关注
     * To Do 过滤接受的字符 
     * @date    Mar 13 2014
     * @author  Polande
     */

    public function follow()
    {
        $this ->check_if_login();
        $userId     = $_POST['userId'];
        $friendId   = $_POST['friendId'];
        $relation   = $_POST['relation'];
        $this ->m_user ->follow($userId, $friendId, $relation);
    }

    public function upload_avat()
    {
        // header("Content-type:image/png");
        $config['upload_path'] = './assets/uploads/images/avatar/';
        $config['allowed_types'] = 'gif|jpg|png';    //设置上传的图片格式
        // $config['max_size'] = '500';              //设置上传图片的文件最大值
        $config['max_width']  = '1200';            //设置图片的最大宽度
        $config['max_height']  = '1200';

        $userName = $_POST['userName'];
        $targetX = $_POST['x'];
        $targetY = $_POST['y'];
        $targetW = $_POST['w'];
        $targetH = $_POST['h'];
        $targetR = $_POST['r'];
        // $targetP_K
        $config['file_name'] = $userName . time();
        $this->load->library('upload', $config);   //加载CI中的图片上传类，并递交设置的各参数值
        if(!$this->upload->do_upload("file")) {
            echo $this->upload->display_errors();
        } else {
            $data['upload_data'] = $this ->upload->data();  //文件的一些信息
            var_dump($data['upload_data']);
            $fileName = $data['upload_data']['file_name'];  //取得文件名
            $p_k = $data['upload_data']['image_width'] / $targetR;
            $this -> crop_img($targetX, $targetY,$targetW, $targetH, $config['upload_path'], $fileName, $p_k);
            $res = $this ->m_user ->update_avatar($fileName,$userName);
            $userId = (($this ->session ->userdata('userId'))*1024+19940309)* 10 ;
             redirect(base_url() . '/index.php/user/index/' . $userId);
        }
    }

    public function crop_img($targetX, $targetY, $targetW, $targetH, $path, $fileName, $p_k) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path .  $fileName;
        $config['new_image'] = $path .  $fileName;
        $config['maintain_ratio'] = FALSE;
        $config['create_thumb'] = FALSE;
        $config['quality'] = "100%";
        $config['x_axis'] = $targetX * $p_k;
        $config['y_axis'] = $targetY * $p_k;
        $config['width'] = $targetW * $p_k;
        $config['height'] = $targetH * $p_k;
        var_dump($config);
        $this->image_lib->initialize($config);
        if($this->image_lib->crop()){
            
            echo "<img src=" . "'/share/". $config['new_image'] . "'". ">";
            // redirect("/index.php/");
        } else {
            echo 'err';
            echo $this->upload->display_errors();
        }

    }

    public function up_process()
    {
        $i = ini_get('session.upload_progress.name');

        $key = ini_get("session.upload_progress.prefix") . $_GET[$i];

        if (!empty($_SESSION[$key])) {
                    $current = $_SESSION[$key]["bytes_processed"];
                            $total = $_SESSION[$key]["content_length"];
                            echo $current < $total ? ceil($current / $total * 100) : 100;
        }else{
                    echo 100;
        }
    }
   
    public function ajax_user_avat()
    {
        $userName = $_POST['name'];
        $sql    = "SELECT u_avatar FROM sh_user WHERE u_name = '$userName' LIMIT 1";
        $query  = $this ->db ->query($sql);
        $res    = $query ->row_array();
        echo  $res['u_avatar'];
    }

    /**
     * 通过用户ID得到用户 发表的文章
     *
     * @author  Polande
     * @date    May 07 2014
     */
    public function get_user_posts($uid)
    {
       return $this ->m_user ->get_user_posts($uid); 
    }
};
?>

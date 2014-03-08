<?php 
//设置当前时区
date_default_timezone_set('Asia/Shanghai');

class M_user extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 向数据库添加新注册用户
     * 
     * @param   $user: 用户输入的注册信息, $userPwd: 加密之后的密码
     * @author  Polande
     * @date    Mar 04 2014
     */
    public function add_user($user, $userPwd) 
    {
        $data = array(
            'u_name' => $user['userName'],
            'u_email' => $user['userEmail'],
            'u_password' => $userPwd,
            'u_motto'   =>  'Hi 不要空着，写上一句话吧! (>_<)', 
            'u_avatar'  => 'dafault.jpg',
            'u_reg_ip' => $user['userIp'],
            'u_reg_time' => $user['regTime']
        );

        $this ->db ->insert('sh_user', $data);
    }

    /**
     * 得到用户名信息
     *
     * @param   用户输入的 $passward $name
     * @return  bollean 正确返回TRUE, 用户名不存在和密码不正确返回FALSE
     * @To do   用户名不存在时输出特定提示
     * @author  Polande
     * @date    Mar 03 2014
     */
    public function login($name, $password)
    {
        $query = $this ->db ->query("SELECT * FROM sh_user where u_name = '$name'");    
        $res = $query ->row_array();
        if($res) {
            if(SHA1( $password . $res['u_reg_time'] . "ShArE") == $res['u_password'] ) {
                return $res;
            } else {
                return FALSE;  
            }
        } else {
            return FALSE;
        }
    }
};
?>

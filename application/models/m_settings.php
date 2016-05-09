<?php 
//设置当前时区
date_default_timezone_set('Asia/Shanghai');

class M_settings extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }

   
    /**
     * 更新用户信息
     * 
     * @param   $user: 用户输入的注册信息
     * @author  Polande
     * @date    Mar 04 2014
     */
    public function add_user($user, $userId) 
    {

        $data = array(
            'u_role1' => $user['role1'],
            'u_role2' => $user['role2'],
             'u_name' => $user['userName'],
             'u_motto' => $user['motto']
        );
        $this->db->where('u_id', $userId);
        $this ->db ->update('sh_user', $data);
    }

};
?>

<?php 
//设置当前时区
date_default_timezone_set('Asia/Shanghai');

class M_user extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }

    public function index($name)
    {
        // $query = $this ->db ->query("SELECT sh_posts.* , sh_user.* FROM sh_posts, sh_user 
                    // WHERE sh_user.u_id = sh_posts.pt_uid AND u_name = '$name' ");
        // $res = $query ->result();
        $query = $this ->db ->query("SELECT * FROM sh_user WHERE u_name = '$name' LIMIT 1");
        $res = $query ->row_array();
        return $res;
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
            'u_avatar'  => 'default.jpg',
            'u_reg_ip' => $user['userIp'],
            'u_reg_time' => $user['regTime'],
            'u_sec_id'        => SHA1($user['userName'])
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


    public function check_register($name)
    {
        $query = $this ->db ->query("SELECT u_name FROM sh_user WHERE u_name = '".$name."' limit 1");
        return $query ->num_rows();
    }

    /**
     *  用户关注处理
     *      如果第一次关注插入一条记录
     *      如果取消关注update 数据库中的记录
     *      如果相互关注update 数据库中的记录 3
     *      没有关系后删除记录
     *
     * @param $userId $friendId 关系用户Id
     * @date    Mar 11 03 2014
     * @author  Polande
     */
    public function follow($userId, $friendId, $relation)
    {
        if($relation == 0 ){
            $sql = "INSERT INTO sh_follow (fw_user_id, fw_friend_id, fw_relation )
                            VALUE('$userId', '$friendId', 1)";
            $this ->db ->query($sql);
        } 
        $sql = "SELECT fw_relation FROM sh_follow  WHERE fw_user_id = '$userId' AND fw_friend_id = '$friendId'"; 
        $query = $this ->db ->query($sql);
        $res = $query ->row_array();
        if (!empty($res)) 
        {
            if ($relation == 1 )
            {
                $sql = "DELETE FROM sh_follow WHERE fw_user_id = '$userId' AND fw_friend_id = '$friendId'";
            } else if($relation == 2) {
                $sql = "UPDATE sh_follow SET fw_relation = 3 WHERE fw_user_id = '$userId' AND fw_friend_id = '$friendId'";
            } else if ($relation == 3) {
                $sql = "UPDATE sh_follow SET fw_relation = 2 WHERE fw_user_id = '$userId AND fw_friend_id = '$friendId'";
            } else { return false; }
        } else {
            if ($relation == 2) {
                $sql = "UPDATE sh_follow SET fw_relation = 3 WHERE fw_user_id = '$friendId' AND fw_friend_id = '$userId'";
            } else if ($relation == 1) {
                $sql = "DELETE FROM sh_follow WHERE fw_user_id = '$friendId' AND fw_friend_id = '$userId'";
            } else if ($relation == 3) {
                $sql = "UPDATE sh_follow SET fw_relation = 1 WHERE fw_user_id = '$friendId' AND fw_friend_id = '$userId'";
            } else {
                return false;
            }
        }
        $this ->db ->query($sql);
    }

    public function get_user_relation($userId, $friendId)
    {
        $sql = "SELECT fw_relation FROM sh_follow WHERE fw_user_id = '$userId' AND fw_friend_id = '$friendId'"; 
        $query = $this ->db ->query($sql);
        $res = $query ->row_array();
        if(!empty($res)){
           return $res; 
        } else {
                $sql = "SELECT fw_relation FROM sh_follow WHERE fw_user_id = '$friendId' AND fw_friend_id = '$userId'"; 
                $query = $this ->db ->query($sql);
                $res = $query ->row_array();
                if(empty($res))
                {
                    $res['fw_relation'] = 0; 
                }
                else if ($res['fw_relation'] == 1)
                {
                    $res['fw_relation'] = $res['fw_relation'] + 1;
                }
                else if ($res['fw_relation'] == 2)
                {
                    $res['fw_relation'] = $res['fw_relation'] - 1;
                } else {
                    $res['fw_relation'] = 3; 
                }
            return $res;
            }
    }
};
?>

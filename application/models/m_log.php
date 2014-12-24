<?php
class M_log extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
	}

	public function get_user_friend($uid) 
	{
		//查询所有关注的用户
		$sql = "SELECT fw_friend_id FROM sh_follow WHERE fw_user_id = '$uid' AND (fw_relation = 1 OR fw_relation = 3)";
		$query = $this ->db ->query($sql);
		$res = $query ->result();
		$sql1 = "SELECT fw_user_id FROM sh_follow WHERE fw_friend_id = '$uid' AND (fw_relation = 2)";
		$query1 = $this ->db ->query($sql1);
		$res1 = $query1 ->result();
		$farray = array_merge($res, $res1);
		return $this ->get_user_log($uid, $farray);
	}

	/**
	 *		将用户操作插入log表
	 *		
	*/
	public function insert_log($uid, $ptId, $logNote) 
	{
		$sql = "INSERT INTO sh_log (log_u_id, log_pt_id, log_note)
							VALUES ('$uid', '$ptId', '$logNote') ";
		$this ->db ->query($sql);
	}
	/**
	 *		
	 *	@pamar $farray: 所有我的关注与互粉的好友数组
	 */
	public function get_user_log($uid, $farray)
	{
		// for($)
		$u_res = array();
		$p_res = array();
		foreach($farray as $row) 
		{
			$key = $row ->fw_friend_id;
			$sql = "SELECT * FROM sh_user WHERE u_sec_id = '$key' ";
			$query = $this ->db ->query($sql);
			$u_res = array_merge($query ->result(), $u_res);
		}

		foreach ($u_res as $row) {
			$uid = $row ->u_id;
			// $sql = "SELECT * FROM sh_posts WHERE pt_uid = '$uid' LIMIT 5";
			$sql = "SELECT * FROM sh_posts INNER JOIN sh_user ON sh_posts.pt_uid = sh_user.u_id WHERE pt_uid = '$uid' LIMIT 20 ";
			$query = $this ->db ->query($sql);
			// $p_res = $query ->result();
			$p_res = array_merge($query ->result(), $p_res);
		}
		// var_dump($p_res);
		return $p_res;
	}
}
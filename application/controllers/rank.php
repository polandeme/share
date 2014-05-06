<?php
class Rank extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this ->load ->model('m_rank');
        $this ->load ->library('session');
    }

    public function up_vote()
    {
       $userId = $this ->session ->userdata('userId');
       $pid = $_POST['id']; 
       if(empty($userId)){
           $_SESSION['login'] = false;
           echo $_SESSION['login'];
       } else {
           if(!$this ->check_up($userId, $pid)) {
               echo $this ->m_rank ->add_vote($pid,$userId); 
           } else {
               echo '已赞';
           }
       }
    }
    
    public function check_up($userId, $pid)
    {
        return $this ->m_rank ->check_up($userId, $pid);        
    }
};
?>

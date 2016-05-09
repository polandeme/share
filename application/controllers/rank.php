<?php
class Rank extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this ->load ->model('m_rank');
        $this ->load ->library('session');
        $this ->load ->model('m_log');
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
            
              $this ->m_log ->insert_log($userId, $pid, 'zan');

              echo $this ->m_rank ->add_vote($pid,$userId); 
           } else {
               echo '已赞';
           }
       }
    }
    
    public function down_vote() 
    {
        $userId = $this ->session ->userdata('userId');
        $pid = $_POST['id']; 
        if(empty($userId)){
            $_SESSION['login'] = false;
            echo $_SESSION['login'];
        } else {
            $data = $this ->m_rank ->down_vote($pid, $userId);
            echo $data;
           // if(!$this ->check_up($userId, $pid)) {
            
           //      $this ->m_log ->insert_log($userId, $pid, 'down');

           //      echo $this ->m_rank ->add_vote($pid,$userId); 
           //  } else {
           //      echo '已赞';
           //  }
        }
    }
    //检查该用户是否赞过这篇文章
    public function check_up($userId, $pid)
    {
        return $this ->m_rank ->check_up($userId, $pid);        
    }
};
?>

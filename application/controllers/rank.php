<?php
class Rank extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this ->load ->model('m_rank');
    }

    public function up_vote()
    {
       $id = $_POST['id']; 
       echo $this ->m_rank ->add_vote($id); 
    }

};
?>

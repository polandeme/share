<?php
class M_posts extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function submit_posts($data)
    {
        $this ->db ->insert('sh_posts', $data);
    }
};
?>

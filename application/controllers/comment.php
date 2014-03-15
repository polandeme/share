<?php
class Comment extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_comment()
    {
        $this ->load ->library('form_validation');
        $this ->form_validation ->set_rules('postDetail','detail','required');
        $this ->form_validation ->set_rules('postId','postId','required|trim');
    }
};

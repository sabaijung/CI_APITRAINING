<?php 

class Authen extends CI_CONTROLLER
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthenModel');
    }

    public function fetchAll()
    {
        $results = $this->AuthenModel->getUsers();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($results));
    }
}
?>

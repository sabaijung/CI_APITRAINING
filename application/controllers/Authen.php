<?php 
class Authen extends CI_CONTROLLER
{
    public function __construct()
    {
		header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		
		parent::__construct();
		//$this->load->model('AuthenModel');
        $this->load->model('AuthenModel','',TRUE);
    }

    public function fetchAll()
    {
        $results = $this->AuthenModel->getUsers();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($results));
	}
	
	 public function cancelData()
    {
	    $result = $this->AuthenModel->cancelData($_GET["username"]);
        echo json_encode($result);
	}

	public function register()
    {
		$result = $this->AuthenModel->register($_GET['username'],
					$_GET['password'],$_GET['email'], $_GET['name']);
        echo json_encode($result);
	}
	
	 public function login()
    {
        $results = $this->AuthenModel->login($_GET['username'],$_GET['password']);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($results));
	}
	

}
?>

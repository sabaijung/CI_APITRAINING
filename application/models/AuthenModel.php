<?php 
class AuthenModel extends CI_model {

	public function __construct(){
        parent::__construct();
    }

	//ใช้สำหรับดึงข้อมูลจากฐานข้อมูลมาแสดง
	public function getUsers()
	{
		$sql = " select * from users ";
		$result = $this->db->query($sql);
        $arrResult = $result->result();
		return $arrResult;

		
	}

	public function register()
    {

	}

}

?>

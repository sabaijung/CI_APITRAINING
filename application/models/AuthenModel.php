<?php 
class AuthenModel extends CI_model {

	//ใช้สำหรับดึงข้อมูลจากฐานข้อมูลมาแสดง
	public function getUsers()
	{
		//$sql = " select * from users ";
		$result = $this->db->query(" select * from users ");
        $arrResult = $result->result();
        return $arrResult;
	}

	public function register()
    {

	}

}

?>

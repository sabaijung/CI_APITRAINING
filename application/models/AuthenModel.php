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

	//ใช้สำหรับอัพเดตข้อมูล เพื่อยกเลิกข้อมูลผู้ใช้งาน
	 public function cancelData($username)
    {
        $result = "";
        try {
            $this->db->trans_start();
            $this->db->where('username', $username);
            $this->db->update('users', array('status' => '0'));
            $this->db->trans_commit();
            $result = 1;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $result = 0;
        }
        return $result;
	}
	
	//ใช้สำหรับบันทึกข้อมูลผู้ใช้งานไปยังฐานข้อมูล
	public function register($username, $password, $email, $name)
    {
        $sql = "SELECT *
        FROM users
        WHERE username = '" . $username . "'";

        $query = $this->db->query($sql);
        $result = $query->result();
        $rows = count($query->result());
        if ($rows > 0) {
           $rs = array([
                'username' => $username,
                'flag' => "0",
                'message' => "ชื่อผู้ใช้งานนี้ เคยลงทะเบียนแล้ว",
            ]);
           
        } else {
            $insert_data = array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
				'status' => '1',
				'name' => $name
 
            );
            $this->db->insert('users', $insert_data);
        
            $rs = array([
                'username' => $username,
                'flag' => "1",
                'message' => "ลงทะเบียนสำเร็จ",
            ]);
        }

        return $rs;

    }

}

?>

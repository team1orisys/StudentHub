<?php
class mainmodel extends CI_model
{
	public function encpas($pass)
	{
		return password_hash($pass, PASSWORD_BCRYPT);
	}
public function studinsert($a,$b)
	{
		
	    $this->db->insert("login",$b);
		$loginid=$this->db->insert_id();
		$b['loginid']=$loginid;
	    $this->db->insert("student",$a);
	}
public function trinsert($c)
	{
		$this->db->insert("login",$c);
	}
	public function selectpass($username,$pass)
	{
		$this->db->select('password');
		$this->db->from("login");
		$this->db->where("username",$username);
		$qry=$this->db->get()->row('password');
		return $this->verifypass($pass,$qry);
	}
	public function verifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}
	public function getuserid($username)
	{
		$this->db->select('id');
		$this->db->from("login");
		$this->db->where("username",$username);
		return $this->db->get()->row('id');
	}
	public function getuser($id)
	{
		$this->db->select('*');
		$this->db->from("login");
		$this->db->where("id",$id);
		return $this->db->get()->row();
	}
   public function grievanceaction($a)
   {
      $this->db->insert("grievances",$a);
    }
    
  /***04/03/2021**/
/***@student***/

/***insert leave details***/
public function insert_leave($a)
  {
    $this->db->insert("leaves",$a);
  }

}
?>